<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renapo', function (Blueprint $table) {
            $table->id();
            $table->string('curp_consulta', 18);
            $table->string('curp_respuesta', 18)->nullable;
            $table->string('nombre')->nullable();
            $table->string('paterno')->nullable();
            $table->string('materno')->nullable();
            $table->date('fec_nacimiento')->nullable();
            $table->integer('id_user')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->smallinteger('estatus')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->index('curp_consulta');
            $table->index('curp_respuesta');
            $table->index('id_user');
            $table->index('estatus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('renapos');
    }
};
