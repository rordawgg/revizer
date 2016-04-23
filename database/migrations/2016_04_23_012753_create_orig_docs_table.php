<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrigDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('origDocs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("user_id");
            $table->string("title");
            $table->text("description");
            $table->text("criteria");
            $table->text("body");
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
        Schema::drop('origDocs');
    }
}
