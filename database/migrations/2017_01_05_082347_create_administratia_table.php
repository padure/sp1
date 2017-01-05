<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministratiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administratia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('anume');
            $table->string('aprenume');
            $table->string('photo');
            $table->string('functia');
            $table->date('anulnasterii');
            $table->integer('experienta');
            $table->string('grad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administratia');
    }
}
