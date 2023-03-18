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
        Schema::table('todos', function (Blueprint $table) {
            $table->bigInteger('category_id')->unsigned();
            $table 
                ->foreign('category_id')//camp de la taula que fara un inner join
                ->references('id') //camp de la taula al que vol fer referencia
                ->on('categories') //taula amb la que es vol relacionar
                ->after('tittle'); //afageix la nova camp sota de tittle
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('todos', function (Blueprint $table) {
            //
        });
    }
};
