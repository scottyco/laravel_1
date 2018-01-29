<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('jobs', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('client_id');
        $table->integer('category_id');
        $table->integer('writer_id');
        $table->integer('pages');
        $table->tinyInteger('level_requested');
        $table->tinyInteger('status');
        $table->timestamp('deadline');
        $table->timestamp('published');
        $table->timestamp('created');

//        $table->string('url')->unique();
//        $table->text('description');
        $table->string('title',120);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
