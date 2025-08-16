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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_form_id');
            
            $table->string('mother_tongue_1', 5)->nullable();
            $table->string('mother_tongue_2', 5)->nullable();
            $table->string('mother_tongue_3', 5)->nullable();
            $table->string('mother_tongue_4', 5)->nullable();
            $table->string('final_mother_tongue', 5)->nullable();
            $table->string('remarks_mother_tongue')->nullable();
            
            $table->string('filipino_1', 5)->nullable();
            $table->string('filipino_2', 5)->nullable();
            $table->string('filipino_3', 5)->nullable();
            $table->string('filipino_4', 5)->nullable();
            $table->string('final_filipino', 5)->nullable();
            $table->string('remarks_filipino')->nullable();
            
            $table->string('english_1', 5)->nullable();
            $table->string('english_2', 5)->nullable();
            $table->string('english_3', 5)->nullable();
            $table->string('english_4', 5)->nullable();
            $table->string('final_english', 5)->nullable();
            $table->string('remarks_english')->nullable();
            
            $table->string('mathematics_1', 5)->nullable();
            $table->string('mathematics_2', 5)->nullable();
            $table->string('mathematics_3', 5)->nullable();
            $table->string('mathematics_4', 5)->nullable();
            $table->string('final_mathematics', 5)->nullable();
            $table->string('remarks_mathematics')->nullable();
            
            $table->string('science_1', 5)->nullable();
            $table->string('science_2', 5)->nullable();
            $table->string('science_3', 5)->nullable();
            $table->string('science_4', 5)->nullable();
            $table->string('final_science', 5)->nullable();
            $table->string('remarks_science')->nullable();
            
            $table->string('araling_panlipunan_1', 5)->nullable();
            $table->string('araling_panlipunan_2', 5)->nullable();
            $table->string('araling_panlipunan_3', 5)->nullable();
            $table->string('araling_panlipunan_4', 5)->nullable();
            $table->string('final_araling_panlipunan', 5)->nullable();
            $table->string('remarks_araling_panlipunan')->nullable();
            
            $table->string('EPP_TLE_1', 5)->nullable();
            $table->string('EPP_TLE_2', 5)->nullable();
            $table->string('EPP_TLE_3', 5)->nullable();
            $table->string('EPP_TLE_4', 5)->nullable();
            $table->string('final_EPP_TLE', 5)->nullable();
            $table->string('remarks_EPP_TLE')->nullable();
            
            $table->string('music_1', 5)->nullable();
            $table->string('music_2', 5)->nullable();
            $table->string('music_3', 5)->nullable();
            $table->string('music_4', 5)->nullable();
            $table->string('final_music', 5)->nullable();
            $table->string('remarks_music')->nullable();
            
            $table->string('arts_1', 5)->nullable();
            $table->string('arts_2', 5)->nullable();
            $table->string('arts_3', 5)->nullable();
            $table->string('arts_4', 5)->nullable();
            $table->string('final_arts', 5)->nullable();
            $table->string('remarks_arts')->nullable();
            
            $table->string('physical_education_1', 5)->nullable();
            $table->string('physical_education_2', 5)->nullable();
            $table->string('physical_education_3', 5)->nullable();
            $table->string('physical_education_4', 5)->nullable();
            $table->string('final_physical_education', 5)->nullable();
            $table->string('remarks_physical_education')->nullable();
            
            $table->string('health_1', 5)->nullable();
            $table->string('health_2', 5)->nullable();
            $table->string('health_3', 5)->nullable();
            $table->string('health_4', 5)->nullable();
            $table->string('final_health', 5)->nullable();
            $table->string('remarks_health')->nullable();
            
            $table->string('arabic_language_1', 5)->nullable();
            $table->string('arabic_language_2', 5)->nullable();
            $table->string('arabic_language_3', 5)->nullable();
            $table->string('arabic_language_4', 5)->nullable();
            $table->string('final_arabic_language', 5)->nullable();
            $table->string('remarks_arabic_language')->nullable();
            
            $table->string('islamic_values_education_1', 5)->nullable();
            $table->string('islamic_values_education_2', 5)->nullable();
            $table->string('islamic_values_education_3', 5)->nullable();
            $table->string('islamic_values_education_4', 5)->nullable();
            $table->string('final_islamic_values_education', 5)->nullable();
            $table->string('remarks_islamic_values_education')->nullable();
            
            $table->string('final_general_average', 5)->nullable();
            $table->string('remarks_general_average')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
