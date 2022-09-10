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
            $table->increments('id');
            $table->string('title', 50);
            $table->string('img', 500);
            $table->string('comment', 500)->nullable();
            $table->string('address', 500);
            $table->string('camera', 50)->nullable();
            $table->string('lens', 50)->nullable();
            $table->string('f_length', 50)->nullable();
            $table->string('f', 50)->nullable();
            $table->string('ss', 50)->nullable();
            $table->string('iso', 50)->nullable();
            $table->string('filmed_at', 50)->nullable();
            $table->string('access', 50)->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('place_id')->unsigned();
            $table->integer('month_id')->unsigned()->nullable();
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
        Schema::dropIfExists('posts');
    }
}
