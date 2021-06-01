<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('author');
            $table->date('pub_date');
            $table->date('cr_date');
            $table->date('mod_date');
            $table->unsignedBigInteger('comments_id');
            $table->unsignedBigInteger('categories_id');
            $table->foreign('comments_id')->references('id')->on('comments');
            $table->foreign('categories_id')->references('id')->on('categories');

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
        Schema::dropIfExists('news');
    }
}
