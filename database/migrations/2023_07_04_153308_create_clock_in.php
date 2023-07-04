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
        Schema::create('clock_in', function (Blueprint $table) {
            $table->id()->unique()->autoIncrement();
            $table->bigInteger('employeeId')->unsigned()->index()->nullable();
            $table->foreign('employeeId')->references('id')->on('employee')->onDelete('cascade');
            $table->dateTime('regEntry')->nullable();
            $table->dateTime('regExit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clock_in');
    }
};