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
        //
        Schema::create('acussations', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('users_id')->unsigned();
            $table->enum('status', ['pending', 'in process','finished'])->nullable()->default('pending'); 
            $table->string('type_of_acusation');
            $table->string('description');
            $table->double('lat_lon');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete("cascade");


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('acussation');
        Schema::dropIfExists('acussations');
        
    }
};
