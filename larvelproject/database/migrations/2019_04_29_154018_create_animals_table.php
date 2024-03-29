<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
			$table->string('animal_name');
			$table->date('date_of_birth');
			$table->string('description');
			$table->string('image', 256);
			$table->enum('availability', ['adopted', 'available'])->default('available');
			$table->unsignedBigInteger('ownerid')->nullable();
			
			$table->foreign('ownerid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
