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
            $table->foreignId('categoria_id')->nullable();
            $table->foreignId('compte_id')->nullable();
            $table->foreignId('curs_id')->nullable();
            $table->string('curs', 50);
            $table->string('pagament',100);
            $table->text('descripcio',100);
            $table->integer('preu');
            $table->timestamps();
            $table->date('data_fi');
            $table->integer('estat');
            $table->foreignId('usuari_id')->references('id')->on('users');

            $table->foreign('categoria_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('compte_id')->references('id')->on('comptes')->onDelete('set null');
            $table->foreign('curs_id')->references('id')->on('cursos')->onDelete('set null');
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
