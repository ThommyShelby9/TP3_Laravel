<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribution', function (Blueprint $table) {
            $table->id('id_attribution');
            $table->foreignId('cours_id')->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->constrained('cours');
            $table->foreignId('student_id')->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->constrained('etudiant_liste');
            $table->timestamps();
        });

        Schema::create('marque', function (Blueprint $table) {
            $table->bigInteger('id_marque')->primary()->autoIncrement();
            $table->string('name')->nullable();
            $table->foreignId('categorie_id')->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->constrained('categorie', 'id_cat');
            $table->timestamps();
        });

        Schema::create('voiture', function (Blueprint $table) {
            $table->bigInteger('id_voiture')->primary()->autoIncrement();
            $table->string('nom_voiture')->nullable();
            $table->string('boite_vitesse')->nullable();
            $table->integer('puissance')->nullable();
            $table->integer('nbre_porte')->nullable();
            $table->string('carburant')->nullable();
            $table->integer('nbre_cylindre')->nullable();
            $table->integer('soupape')->nullable();
            $table->integer('vitesse_max')->nullable();
            $table->string('carosserie')->nullable();
            $table->string('transmission')->nullable();
            $table->string('frein')->nullable();
            $table->integer('acceleration')->nullable();
            $table->string('couleur')->nullable();
            $table->string('image_principale')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->foreignId('modele_id')->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->constrained('modele', 'id_modele');
            $table->timestamps();
        });



        Schema::create('modele', function (Blueprint $table) {
            $table->bigInteger('id_modele')->primary()->autoIncrement();
            $table->string('modele_name')->nullable();
            $table->year('annee')->nullable();
            $table->foreignId('marque_id')->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->constrained('marque', 'id_marque');
            $table->timestamps();
        });




        Schema::create('location', function (Blueprint $table) {
            $table->bigInteger('id_location')->primary()->autoIncrement();
            $table->foreignId('id_client')->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->constrained('client', 'id_client');
            $table->foreignId('id_voiture')->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->constrained('voiture', 'id_voiture');
            $table->dateTime('date_sortie_voiture')->nullable();
            $table->dateTime('date_prevue_retour')->nullable();
            $table->dateTime('date_retour_effectif')->nullable();
            $table->string('observation')->nullable();
            $table->timestamps();
        });




        Schema::create('client', function (Blueprint $table) {
            $table->bigInteger('id_client')->primary()->autoIncrement();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('tel')->nullable();
            $table->string('adresse')->nullable();
            $table->string('photo')->nullable();
            $table->string('cni')->nullable();
            $table->string('email')->unique();
            $table->timestamps();
        });


        Schema::create('categorie', function (Blueprint $table) {
            $table->bigInteger('id_cat')->primary()->autoIncrement();
            $table->string('name')->nullable();
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigInteger('id_user')->primary()->autoIncrement();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('email')->unique();
            $table->string('password');
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
        Schema::dropIfExists('attribution');
    }
}
