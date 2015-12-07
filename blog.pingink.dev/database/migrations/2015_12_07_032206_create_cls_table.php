<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClsTable extends Migration
{
    protected $dateFormat = 'U';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->tinyInteger('sort')->unsigned();
            $table->tinyInteger('state')->unsigned()->default(1);
            $table->timestamps();

            $table->index('state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cls');
    }
}
