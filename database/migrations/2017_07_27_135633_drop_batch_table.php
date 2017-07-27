<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropBatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('daily_view_batch');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('daily_view_batch', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('scenario_id')->nullable()->index();
            $table->integer('story_id')->nullable()->index();
            $table->timestamps();
        });
    }
}
