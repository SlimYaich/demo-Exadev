<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voitures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('marque');
            $table->string('couleur');
            $table->string('catégorie');
            $table->string('nbPlace');
            $table->string('vitesse');
            $table->string('kilometrage');
            $table->string('PrixJ');
            $table->boolean('dispo')->default(0);
            $table->string('image')->default("https://picsum.photos/seed/picsum/200/300
            ");
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
        Schema::dropIfExists('voitures');
    }
}
