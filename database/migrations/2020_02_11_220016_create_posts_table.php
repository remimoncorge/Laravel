<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->text('post_content');
            $table->text('post_title');
            $table->string('post_status',20);
            $table->string('post_name',200);
            $table->string('image_file',255)->nullable();
            $table->string('post_type',20)->nullable();
            $table->text('post_category');
            $table->text('created_at');
            $table->text('updated_at');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
