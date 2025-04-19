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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->date('date');
            $table->text('time_in_1')->nullable();
            $table->text('time_out_1')->nullable();
            $table->text('time_in_2')->nullable();
            $table->text('time_out_2')->nullable();
            $table->text('late_time')->nullable();
            $table->text('total')->nullable();
            $table->text('remarks')->nullable();
            $table->smallInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
