<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username');
            $table->string('phone')->nullable();;
            $table->string('address')->nullable();;
            $table->string('city')->nullable();;
            $table->string('state')->nullable();;
            $table->string('country')->nullable();;
            $table->string('profile_image')->nullable();;
            $table->string('user_role');
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
          $table->dropColumn('username');
          $table->dropColumn('phone');
          $table->dropColumn('address');
          $table->dropColumn('city');
          $table->dropColumn('state');
          $table->dropColumn('country');
          $table->dropColumn('profile_image');
          $table->dropColumn('user_role');
        });
    }
}
