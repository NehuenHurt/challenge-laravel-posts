<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_usuario')->index('fk_challenge_users');
            $table->integer('id_categoria')->index('fk_challenge_categoria');
            $table->string('titulo', 100);
            $table->string('slug', 100);
            $table->string('imagen', 100);
            $table->text('descripcion');
            $table->dateTime('created', 6)->nullable();
            $table->dateTime('modified', 6)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
