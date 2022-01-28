<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->text('description');
            $table->string('email');
            $table->string('phone');
            $table->unsignedBigInteger('image_id');
            $table->foreign('image_id')->references('id')->on('profile_images');
            //sudaromas rysys su kita lentele. image id susijes su id kuris yra kitoj lentelej

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
        Schema::dropIfExists('profiles');
    }
}
