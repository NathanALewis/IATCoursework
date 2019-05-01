<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('userid');
			$table->unsignedBigInteger('animalid');
			$table->enum('status', ['pending', 'accepted', 'denied'])->default('pending');
			
			$table->foreign('userid')->references('id')->on('users');
			$table->foreign('animalid')->references('id')->on('animals');
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
        Schema::dropIfExists('requests');
    }
}
