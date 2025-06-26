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
        Schema::create('pupils', function (Blueprint $table) {
            $table->id();
            $table->text('image')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->text('birth_date');
            $table->string('gender');
            $table->text('email_address')->nullable();
            $table->text('address');
            // $table->text('student_form_10')->nullable();
            $table->smallInteger('grade_level');
            $table->text('section');
            $table->smallInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pupils');
    }
};
