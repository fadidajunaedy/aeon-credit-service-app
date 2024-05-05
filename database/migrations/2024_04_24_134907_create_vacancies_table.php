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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('position_name');
            $table->string('recruitment_type');
            $table->string('work_location');
            $table->string('working_time');
            $table->string('worker_status');
            $table->string('application_deadline');
            $table->longText('job_description');
            $table->longText('requirements');
            $table->string('level');
            $table->string('minimum_experience');
            $table->string('education_level');
            $table->string('major');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
