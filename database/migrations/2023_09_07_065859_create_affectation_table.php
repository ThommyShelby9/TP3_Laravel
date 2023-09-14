<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffectationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affectation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->constrained('teacher');
            $table->foreignId('cours_id')->nullable()
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->constrained('cours');
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
        Schema::dropIfExists('affectation');
    }
}
