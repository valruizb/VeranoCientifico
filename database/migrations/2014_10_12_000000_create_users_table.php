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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipouser');
            $table->string('nombre');
            $table->string('apellidop');
            $table->string('apellidom');
            $table->string('curp')->unique()->nullable();
            $table->string('correo')->unique();
            $table->string('correocon')->unique();
            $table->string('telefono');
            $table->string('institucionproced')->nullable();;
            $table->string('formatosolicitud')->nullable();//revisor
            $table->string('areaconoc')->nullable();//profesor
            $table->string('subareaconoc')->nullable();
            $table->string('nivelsni')->nullable();
            $table->string('gradomax')->nullable();
            $table->string('lineainv')->nullable();
            $table->string('puesto')->nullable();
            $table->string('constancia')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            //$table->foreignId('current_team_id')->nullable();
            //$table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
};
