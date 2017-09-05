<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tUsuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',20)->unique();
            //$table->string('email')->unique();
            $table->string('password');
            $table->string('tipo');
            $table->rememberToken();
            $table->timestamps(); //-> registro en el tiempo
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tUsuarios');
    }
}
