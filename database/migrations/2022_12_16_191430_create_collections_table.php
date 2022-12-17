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
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->string('collectionCode');
            $table->string('collectionName');
            $table->string('collectionAuthor');
            $table->string('collectionPublishYear');
            $table->text('collectionDesc')->nullable();
            $table->string('collectionImage')->nullable();
            $table->unsignedBigInteger('collectionTypeID');
            $table->foreign('collectionTypeID')
                ->references('id')
                ->on('collection_types')
                ->onDelete('cascade');
            $table->unsignedBigInteger('collectionStatusID');
            $table->foreign('collectionStatusID')
                ->references('id')
                ->on('collection_statuses')
                ->onDelete('cascade');;
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
        Schema::dropIfExists('collections');
    }
};
