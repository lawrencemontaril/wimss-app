<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guardian extends Model
{
    use HasFactory;

    /* -------------------------------- */
    // Properties
    /* -------------------------------- */

    protected $fillable = [
        'hei_id',
        'student_id',
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

    public function child(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
