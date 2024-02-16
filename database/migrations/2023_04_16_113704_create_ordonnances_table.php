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
        Schema::create('ordonnances', function (Blueprint $table) {
            $table->bigIncrements('num_ordonnance');
            $table->date('date_ordonnance');
            $table->string('nom_medicament');
            $table->string('quantite_medicament');
            $table->string('posologie_medicament');
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
        Schema::dropIfExists('ordonnances');
    }
};
