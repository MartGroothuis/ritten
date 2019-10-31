<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rits', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('user_id');

            $table->string('van');
            $table->string('naar');

            $table->bigInteger('beginstand');
            $table->bigInteger('eindstand');

            $table->boolean('retour')->default(false);
            $table->boolean('zakelijk')->default(false);

            $table->longText('omschrijving')->nullable();

            $table->timestamps();


            // Van	
            // Naar
            // Beginstand
            // Eindstand
            // Retour
            // Zakelijk
            // Omschrijving

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ritten');
    }
}
