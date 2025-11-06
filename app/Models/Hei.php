<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hei extends Model
{
    use HasFactory;

    /* -------------------------------- */
    // Properties
    /* -------------------------------- */

    protected $fillable = [
        'name',
        'address'
    ];

    /* -------------------------------- */
    // Relationships
    /* -------------------------------- */

    public function deans(): HasMany
    {
        return $this->hasMany(Dean::class);
    }

    public function faculties(): HasMany
    {
        return $this->hasMany(Faculty::class);
    }

    public function htes(): HasMany
    {
        return $this->hasMany(Hte::class);
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function guardians(): HasMany
    {
        return $this->hasMany(Guardian::class);
    }

    /* -------------------------------- */
    // Query Scopes
    /* -------------------------------- */

    public function scopeSearch(Builder $query, $search = null) {
        $query->where('name', 'like', "%$search%");
    }

    /* -------------------------------- */
    // Model Events
    /* -------------------------------- */

    protected static function booted()
    {
        static::deleting(function ($hei) {
            $relations = ['deans', 'faculties', 'htes', 'students', 'guardians'];

            $hei->load($relations);

            foreach ($relations as $relation) {
                if ($hei->$relation) {
                    foreach ($hei->$relation as $profile) {
                        if ($profile->user) {
                            $profile->user->delete();
                        }
                    }
                }
            }
        });
    }
}
