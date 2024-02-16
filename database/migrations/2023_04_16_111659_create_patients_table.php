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
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('num_patient');
            $table->string('cin');
            $table->string('nom_patient');
            $table->string('prenom_patient');
            $table->integer('age_patient');
            $table->string('sexe_patient');
            $table->string('mutuelle_patient');
            $table->string('tel_patient');
            $table->string('adresse_patient');
            $table->integer('taille_patient');
            $table->integer('poids_patient');
            $table->string('groupesanguin');
            
            $table->rememberToken();
            $table->timestamps();
            
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
