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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collectionID');
            $table->foreign('collectionID')
                ->references('id')
                ->on('collections')
                ->onDelete('cascade');
            $table->unsignedBigInteger('userID');
            $table->foreign('userID')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->enum('is_approved', ['0', '1', '2', '3'])->default('0')->comment('0 = Pending, 1 = Approved, 2 = Rejected, 3 = Expired');
            $table->timestamp('loan_date')->default(\DB::raw('CURRENT_TIMESTAMP'))->nullable();
            $table->timestamp('expiration_date')->default(\DB::raw('CURRENT_TIMESTAMP'))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
};
