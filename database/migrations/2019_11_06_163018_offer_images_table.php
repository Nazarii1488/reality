<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OfferImagesTable extends Migration
{
    public function up()
    {
        Schema::create('offer_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('offer_id');
            $table->string('name');
            $table->timestamps();
            $table->foreign('offer_id')->references('id')->on('offers')
                ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    public function down()
    {
        //
    }
}
