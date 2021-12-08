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
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->string('title');
            $table->unsignedBigInteger("create_by")->nullable();
            $table->unsignedBigInteger("deleted_by")->nullable();

            $table->timestamps();

            $table->foreign("deleted_by")
                ->references("id")
                ->on("users");
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
