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
        Schema::create('controles', function (Blueprint $table) {
            $table->bigIncrements('num_controle');
            $table->date('date_controle');
            $table->string('motif_controle');
            $table->string('diagnostic_controle');
            $table->string('commentaire_controle');
            $table->foreignId('num_patient')->references('num_patient')->on('patients');
            
            $table->timestamps();
        }
    );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controles');
    }
};
