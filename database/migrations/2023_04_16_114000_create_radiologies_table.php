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
        Schema::create('radiologies', function (Blueprint $table) {
            $table->bigIncrements('num_radiologie');
            $table->date('date_radiologie');
            $table->string('type_radiologie');
            $table->string('resultat_radiologie')->nullable(true);
            $table->foreignId('num_consultation')->references('num_consultation')->on('consultations');
            $table->foreignId('num_controle')->references('num_controle')->on('controles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('radiologies');
    }
};
