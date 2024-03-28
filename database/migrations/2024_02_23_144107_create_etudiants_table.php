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
        Schema::create('etudiants', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('id')->unique();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->text('adresse');
            $table->string('telephone');
            $table->date('date_de_naissance');
            $table->unsignedBigInteger('ville_id');
            $table->foreign('ville_id')->references('id')->on('villes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
