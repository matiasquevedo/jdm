<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventosPostView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::statement("CREATE VIEW eventospostview AS SELECT eventos.id, eventos.title, eventos.fecha, eventos.hora, eventos.precio, eventos.lugar, eventos.tipo, eventos.descripcion, eventos.created_at, eventos.updated_at, imagesEventos.foto FROM eventos, imagesEventos WHERE state = '1' AND imagesEventos.evento_id = eventos.id  ORDER BY eventos.updated_at DESC;");
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
