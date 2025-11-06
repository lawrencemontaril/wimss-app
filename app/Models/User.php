<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Attributes\Scope;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasUlids;

    /*
    | ------------
    |  Properties
    | ------------
    */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'contact_number',
        'sex',
        'email',
        'password',
        'profile_type',
        'profile_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    /*
    | ---------------
    |  Relationships
    | ---------------
    */
    public function profile(): MorphTo
    {
        return $this->morphTo();
    }

    /*
    | --------
    |  Scopes
    | --------
    */
    #[Scope]
    protected function search(Builder $query, $search = null): void
    {
        $query->where(function ($q) use ($search) {
            $q->where('first_name', 'like', "%$search%")
              ->orWhere('last_name', 'like', "%$search%");
        });
    }

    #[Scope]
    protected function dean(Builder $query)
    {
        $query->whereHasMorph('profile', [Dean::class]);
    }

    #[Scope]
    protected function faculty(Builder $query)
    {
        $query->whereHasMorph('profile', [Faculty::class]);
    }

        #[Scope]
    protected function hte(Builder $query)
    {
        $query->whereHasMorph('profile', [Hte::class]);
    }

    #[Scope]
    protected function student(Builder $query)
    {
        $query->whereHasMorph('profile', [Student::class]);
    }

    #[Scope]
    protected function guardian(Builder $query)
    {
        $query->whereHasMorph('profile', [Guardian::class]);
    }

    #[Scope]
    protected function withHei(Builder $query, int $heiId)
    {
        $query->whereHasMorph(
            'profile',
            [Dean::class, Faculty::class, Hte::class, Student::class, Guardian::class],
            function($q) use ($heiId) {
                $q->where('hei_id', $heiId);
            });
    }

    /*
    | ------------
    |  Attributes
    | ------------
    */
    protected function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getRoleAttribute(): string
    {
        return match ($this->profile_type) {
            Dean::class => "dean",
            Faculty::class => "faculty",
            Hte::class => "hte",
            Student::class => "student",
            Guardian::class => "guardian",
            default => "admin",
        };
    }

    // Role checking methods
    public function isAdmin(): bool
    {
        return is_null($this->profile_type);
    }

    public function isDean(): bool
    {
        return $this->profile_type === Dean::class;
    }

    public function isFaculty(): bool
    {
        return $this->profile_type === Faculty::class;
    }

    public function isHte(): bool
    {
        return $this->profile_type === Hte::class;
    }

    public function isStudent(): bool
    {
        return $this->profile_type === Student::class;
    }

    public function isGuardian(): bool
    {
        return $this->profile_type === Guardian::class;
    }

    /* -------------------------------- */
    // Model Events
    /* -------------------------------- */
    protected static function booted()
    {
        static::deleting(function ($user) {
            $user->load("profile");
            if ($user->profile) {
                $user->profile->delete();
            }
        });

        static::saving(function ($user) {
            $user->first_name = Str::title($user->first_name);
            $user->last_name = Str::title($user->last_name);
        });
    }
}
