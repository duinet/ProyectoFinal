<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagaments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')->references('id')->on('categories');
            $table->foreignId('compte_id')->references('id')->on('comptes');
            $table->string('curs', 50);
            // $table->text('comanda');
            $table->string('pagament',100);
            $table->text('descripcio',100);
            $table->integer('preu');
            $table->timestamps();
            $table->date('data_fi');
            $table->integer('estat');
            $table->foreignId('usuari_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagaments');
    }
}
