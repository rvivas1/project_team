<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObsequiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obsequios', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->integer('valor_obs');
            $table->char('edo',1);

            $table->foreignId('id_prod')->constrained('productos');
            $table->foreignId('id_clien')->constrained('clientes');

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
        Schema::dropIfExists('obsequios');
    }
}
