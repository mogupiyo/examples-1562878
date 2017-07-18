<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSenariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scenarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('category_id');
            $table->string('title');
            $table->string('description');
            $table->longText('content')->nullable();
            $table->string('thumbnail')->nullable();
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
        Schema::dropIfExists('scenarios');
    }
}
