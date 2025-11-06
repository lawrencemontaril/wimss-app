<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Faculty extends Model
{
    use HasFactory;

    /* -------------------------------- */
    // Properties
    /* -------------------------------- */

    protected $fillable = [
        'hei_id',
        'course_id'
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

    public function department(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function htes(): HasMany
    {
        return $this->hasMany(Hte::class);
    }

    public function guardians(): HasManyThrough
    {
        return $this->hasManyThrough(Guardian::class, Student::class);
    }

    /* -------------------------------- */
    // Model Events
    /* -------------------------------- */
    protected static function booted()
    {
        static::deleting(function ($faculty) {
            if ($faculty->students) {
                foreach($faculty->students as $student) {
                    if ($student->user) {
                        $student->user->delete();
                    }
                }
            }

            if ($faculty->htes) {
                foreach($faculty->htes as $hte) {
                    if ($hte->user) {
                        $hte->user->delete();
                    }
                }
            }
        });
    }
}
