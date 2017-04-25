<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    public function up()
    {
		Schema::create('posts', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('url', 100);
            $table->text('content');
            $table->integer('created_by')->unsigned(); //column definition
			$table->foreign('created_by')->references('id')->on('users'); //foreign key
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('posts');
    }
}
