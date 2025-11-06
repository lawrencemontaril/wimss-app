<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Hei;
use App\Models\Hte;
use App\Models\Course;
use App\Models\Faculty;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Hei::class)->cascadeOnDelete();
            $table->foreignIdFor(Course::class)->cascadeOnDelete();
            $table->foreignIdFor(Faculty::class)->cascadeOnDelete();
            $table->foreignIdFor(Hte::class)->cascadeOnDelete();

            $table->year('school_year');

            $table->unsignedTinyInteger('per1')->nullable();
            $table->unsignedTinyInteger('per2')->nullable();
            $table->unsignedTinyInteger('per3')->nullable();
            $table->unsignedTinyInteger('per4')->nullable();
            $table->unsignedTinyInteger('per5')->nullable();
            $table->unsignedTinyInteger('per_total')->nullable();
            $table->unsignedTinyInteger('tech1')->nullable();
            $table->unsignedTinyInteger('tech2')->nullable();
            $table->unsignedTinyInteger('tech3')->nullable();
            $table->unsignedTinyInteger('tech4')->nullable();
            $table->unsignedTinyInteger('tech5')->nullable();
            $table->unsignedTinyInteger('tech6')->nullable();
            $table->unsignedTinyInteger('tech_total')->nullable();
            $table->unsignedTinyInteger('office1')->nullable();
            $table->unsignedTinyInteger('office2')->nullable();
            $table->unsignedTinyInteger('office3')->nullable();
            $table->unsignedTinyInteger('office4')->nullable();
            $table->unsignedTinyInteger('office5')->nullable();
            $table->unsignedTinyInteger('office6')->nullable();
            $table->unsignedTinyInteger('office7')->nullable();
            $table->unsignedTinyInteger('office_total')->nullable();
            $table->unsignedTinyInteger('likert_total')->nullable();
            $table->unsignedTinyInteger('adviser_rating')->nullable();
            $table->unsignedTinyInteger('final_grade')->nullable();
            $table->string('recom')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
