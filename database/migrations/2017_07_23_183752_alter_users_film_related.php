<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersFilmRelated extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('roll')->default('user')->after('id');
            $table->boolean('film_related')->default(false)->after('avatar');
            $table->boolean('approved')->default(false)->after('film_related');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('roll');
            $table->dropColumn('film_related');
            $table->dropColumn('approved');
        });
    }
}
