<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;

    /* -------------------------------- */
    // Properties
    /* -------------------------------- */

    protected $fillable = [
        'hei_id',
        'faculty_id',
        'hte_id',
        'course_id',
        'school_year',
        'per1',
        'per2',
        'per3',
        'per4',
        'per5',
        'per_total',
        'tech1',
        'tech2',
        'tech3',
        'tech4',
        'tech5',
        'tech6',
        'tech_total',
        'office1',
        'office2',
        'office3',
        'office4',
        'office5',
        'office6',
        'office7',
        'office_total',
        'likert_total',
        'adviser_rating',
        'final_grade',
        'recom'
    ];

    protected $appends = ['rating'];

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

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }

    public function hte(): BelongsTo
    {
        return $this->belongsTo(Hte::class);
    }

    public function guardian(): HasOne
    {
        return $this->hasOne(Guardian::class);
    }

    /* -------------------------------- */
    // Accessors/Mutators
    /* -------------------------------- */

    public function getIsPassedAttribute(): bool
    {
        return $this->final_grade >= 75;
    }

    public function getIsFailedAttribute(): bool
    {
        return !is_null($this->final_grade) && $this->final_grade < 75;
    }

    public function getIsPendingAttribute(): bool
    {
        return is_null($this->final_grade);
    }

    public function getRatingAttribute(): string
    {
        return match (true) {
            is_null($this->final_grade) => 'Pending',
            $this->final_grade >= 75 => 'Absorbed',
            default => 'Not Absorbed',
        };
    }

    public function getIsGradedAttribute(): bool
    {
        return !is_null($this->final_grade);
    }

    /* -------------------------------- */
    // Query Scopes
    /* -------------------------------- */

    public function scopeHei(Builder $query, Hei $hei): void
    {
        $query->where('hei_id', $hei->id);
    }

    public function scopePassed(Builder $query): void
    {
        $query->whereNotNull('final_grade')
            ->where('final_grade', '>=', 75);
    }

    public function scopeFailed(Builder $query): void
    {
        $query->whereNotNull('final_grade')
            ->where('final_grade', '<', 75);
    }

    public function scopePending(Builder $query): void
    {
        $query->whereNull('final_grade');
    }
    
    /* -------------------------------- */
    // Scopes (local)
    /* -------------------------------- */
    public function scopeNoScope($query)
    {
        return $query->join('users', function ($join) {
                $join->on('students.id', '=', 'users.profile_id')
                    ->where('users.profile_type', '=', Student::class);
            })
            ->join('heis', 'students.hei_id', '=', 'heis.id')
            ->join('faculties', 'students.faculty_id', '=', 'faculties.id')
            ->join('users as faculty_users', function($join) {
                $join->on('faculty_users.profile_id', '=', 'faculties.id')
                    ->where('faculty_users.profile_type', Faculty::class);
            })
            ->join('htes', 'students.hte_id', '=', 'htes.id')
            ->select(
                'students.*',
                'users.first_name as student_first_name',
                'users.last_name as student_last_name',
                'students.final_grade',
                'heis.name as hei_name',
                DB::raw("CONCAT(faculty_users.first_name, ' ', faculty_users.last_name) AS faculty_full_name"),
                'htes.name as hte_name'
            )
            ->orderBy('students.final_grade', 'desc')
            ->orderBy('users.last_name');
    }

    public function scopeByHei($query, $heiId)
    {
        return $query->NoScope()
            ->where('heis.id', $heiId);
    }

    public function scopeByHeiAndFaculty($query, $heiId, $facultyId)
    {
        return $query->NoScope()
            ->where('heis.id', $heiId)
            ->where('faculties.id', $facultyId);
    }

    public function scopeByHeiAndHte($query, $heiId, $hteId)
    {
        return $query->NoScope()
            ->where('heis.id', $heiId)
            ->where('htes.id', $hteId);
    }

    /* -------------------------------- */
    // Model Events
    /* -------------------------------- */

    protected static function booted()
    {
        static::deleting(function ($student) {
            if ($student->guardian) {
                if ($student->guardian->user) {
                    $student->guardian->user->delete();
                }
            }
        });

        static::saving(function ($student) {
            if (!is_null($student->adviser_rating) && !is_null($student->likert_total)) {
                $student->final_grade = $student->likert_total + $student->adviser_rating;
            }
        });
    }
}
