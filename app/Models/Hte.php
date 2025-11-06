<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class Hte extends Model
{
    use HasFactory;

    /* -------------------------------- */
    // Rroperties
    /* -------------------------------- */

    protected $fillable = [
        'hei_id',
        'faculty_id',
        'name',
        'address',
        'company_number',
        'president',
        'memorandum'
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

    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function guardians(): HasManyThrough
    {
        return $this->hasManyThrough(Guardian::class, Student::class);
    }

    /* -------------------------------- */
    // Query Scopes
    /* -------------------------------- */

    public function scopeSearch(Builder $query, $search = null): void
    {
        $query->where('name', 'like', "%$search%");
    }

    /* -------------------------------- */
    // Model Events
    /* -------------------------------- */

    protected static function booted()
    {
        static::deleting(function ($hte) {
            if ($hte->students) {
                foreach($hte->students as $student) {
                    if ($student->user) {
                        $student->user->delete();
                    }
                }
            }

            if ($hte->memorandum) {
                Storage::disk('public')->delete($hte->memorandum);
            }
        });
    }
}
