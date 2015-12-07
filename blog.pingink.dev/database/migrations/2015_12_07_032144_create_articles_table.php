<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    protected $dateFormat = 'U';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('intro');
            $table->string('img_url');
            $table->text('content');
            $table->integer('cls_id')->unsigned();
            $table->tinyInteger('state')->unsigned()->default(1);
            $table->timestamps();
            
            $table->index('state');
            $table->index('cls_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
