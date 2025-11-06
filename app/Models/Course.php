<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Scope;

class Course extends Model
{
    /*
    | ------------
    |  Properties
    | ------------
    */
    protected $fillable = [
        'name',
        'code',
        'accreditation',
        'description'
    ];

    /*
    | ---------------
    |  Relationships
    | ---------------
    */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function faculties(): HasMany
    {
        return $this->hasMany(Faculty::class);
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
            $q->where('name', 'like', '%'.$search.'%')
                ->orWhere('code', 'like', '%'.$search.'%');
        });
    }
}
