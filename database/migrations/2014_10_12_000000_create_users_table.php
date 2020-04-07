<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('patronymic')->nullable();
            $table->string('surname')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('surname')->nullable();
            $table->string('email')->nullable();
            $table->string('favorites_id')->nullable();
            $table->string('shop_id')->nullable();
            $table->string('shop_id')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
