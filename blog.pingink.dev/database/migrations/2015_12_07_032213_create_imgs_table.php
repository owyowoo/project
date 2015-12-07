<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImgsTable extends Migration
{
    protected $dateFormat = 'U';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('mime');
            $table->string('ext');
            $table->string('url');
            $table->string('path');
            $table->string('domain');
            $table->integer('size')->unsigned();
            $table->string('hash');
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
        Schema::drop('imgs');
    }
}
