<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('state',['0','1'])->default('0');
            $table->string('title');
            $table->string('fecha');
            $table->string('hora');
            $table->string('lugar');
            $table->string('tipo');
            $table->longText('descripcion');
            $table->string('precio');
            $table->integer('user_id')->unsigned();

            //llaves foraneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        //
    }
}
