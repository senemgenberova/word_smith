<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('posts', function(Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->integer('category_id');
                $table->string('title');
                $table->text('description');
                $table->text('image');
                $table->string('post_slug');
                $table->integer('view_count');
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
        Schema::drop('posts');
    }

}
