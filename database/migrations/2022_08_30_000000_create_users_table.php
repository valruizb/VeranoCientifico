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
            $table->string('rol');
            $table->string('name');
            $table->string('lastnamep');
            $table->string('lastnamem');
            $table->string('curp')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('emailcon')->unique();
            $table->string('phone');
            $table->unsignedBigInteger('institution_id');
            $table->string('requestform')->nullable();//revisor
            $table->unsignedBigInteger('thematic_id')->nullable();//profesor
            $table->unsignedBigInteger('subthematic_id')->nullable();
            $table->string('snilevel')->nullable();
            $table->string('maxgrade')->nullable();
            $table->string('invline')->nullable();
            $table->string('job')->nullable();
            $table->string('constancy')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreign('institution_id')->references('id')->on('institutions');
            $table->foreign('thematic_id')->references('id')->on('thematics');
            $table->foreign('subthematic_id')->references('id')->on('subthematics');
            //$table->foreignId('current_team_id')->nullable();
            //$table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
            $table->softDeletes();
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
