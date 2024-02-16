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
        Schema::create('consultations', function (Blueprint $table) {
            $table->bigIncrements('num_consultation');
            $table->date('date_consultation');
            $table->string('motif_consultation');
            $table->string('diagnostic_consultation');
            $table->string('commentaire_consultation')->nullable(true);
            $table->foreignId('num_patient')->references('num_patient')->on('patients');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
