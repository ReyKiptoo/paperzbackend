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
        Schema::create('past_papers', function (Blueprint $table) {
            $table->id('paper_id');
            $table->unsignedBigInteger('unit_id');
            $table->string('firebase_url', 255);
            $table->string('file_name', 50);
            $table->enum('type', ['Exam', 'CAT']);
            $table->string('description', 100)->nullable();
            $table->string('month_year', 5)->nullable();
            $table->timestamps();
            
            $table->foreign('unit_id')->references('unit_id')->on('units');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('past_papers');
    }
};
