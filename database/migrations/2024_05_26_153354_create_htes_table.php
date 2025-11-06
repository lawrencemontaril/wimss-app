<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('htes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hei_id')->constrained()->onDelete('cascade');
            $table->foreignId('faculty_id')->constrained()->onDelete('cascade');
            $table->string('name', length: 128);
            $table->string('address', length: 256);
            $table->string('company_number', length: 15);
            $table->string('president', length: 256);
            $table->text('memorandum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('htes');
    }
};
