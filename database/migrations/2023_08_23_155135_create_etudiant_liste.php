<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantListe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiant_liste', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('surname')->nullable(false);
            $table->string('speciality')->nullable(false);
            $table->string('birthday')->nullable(false);
            $table->longText('bio')->nullable(false);
            $table->string('hobbies')->nullable(false);
            $table->string('photo')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiant_liste');
    }
}
