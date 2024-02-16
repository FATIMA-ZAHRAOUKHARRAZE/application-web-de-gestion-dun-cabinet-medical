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
        Schema::create('certificats', function (Blueprint $table) {
            $table->bigIncrements('num_certificat');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->integer('nbrjour_certificat');
            $table->string('type_certificat');
            $table->string('descriptif_certificat')->nullable(true);
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
        Schema::dropIfExists('certificats');
    }
};