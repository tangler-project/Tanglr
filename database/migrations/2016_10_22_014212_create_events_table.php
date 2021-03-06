<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');

            $table->string('img_url');
            $table->text('content');
            $table->string('title');

            //foreign key for users
            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('users');

            //foreign key for groups
            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('groups');

            //start and end date for the posts
            $table->dateTime('start_date');
            $table->dateTime('end_date');

            //for soft deleting
            $table->softDeletes();
            

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
        Schema::drop('events');
    }
}
