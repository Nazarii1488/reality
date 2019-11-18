<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArticleImagesTable extends Migration
{
    public function up()
    {
        Schema::create('article_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('article_id');
            $table->string('name');
            $table->timestamps();
            $table->foreign('article_id')->references('id')->on('article')
                ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    public function down()
    {
        //
    }
}
