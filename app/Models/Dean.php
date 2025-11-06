<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class Dean extends Model
{
    use HasFactory;

    /* -------------------------------- */
    // Properties
    /* -------------------------------- */

    protected $fillable = [
        'hei_id'
    ];

    /* -------------------------------- */
    // Relationships
    /* -------------------------------- */

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'profile');
    }

    public function hei(): BelongsTo
    {
        return $this->belongsTo(Hei::class);
    }

    public function faculties(): HasMany
    {
        return $this->hasMany(Faculty::class, 'hei_id', 'hei_id');
    }

    public function deans(): HasMany
    {
        return $this->hasMany(Dean::class, 'hei_id', 'hei_id');
    }

    public function htes(): HasMany
    {
        return $this->hasMany(Hte::class, 'hei_id', 'hei_id');
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'hei_id', 'hei_id');
    }

    public function guardians(): HasMany
    {
        return $this->hasMany(Guardian::class, 'hei_id', 'hei_id');
    }

    /* -------------------------------- */
    // Query Scopes
    /* -------------------------------- */

    public function scopeByHei(Builder $query, Hei $hei): void
    {
        $query->where('hei_id', $hei->id);
    }
}
