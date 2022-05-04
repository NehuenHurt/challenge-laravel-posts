<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->foreign(['id_usuario'], 'fk_challenge_users')->references(['id'])->on('users');
            $table->foreign(['id_categoria'], 'fk_challenge_categoria')->references(['id'])->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('fk_challenge_users');
            $table->dropForeign('fk_challenge_categoria');
        });
    }
}
