<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->nullable(false);
            $table->string('district')->nullable(false);
            $table->string('coordinate')->nullable(false);
            $table->text('address_detail')->nullable(false);
            $table->string('category_id')->nullable(false);
            $table->integer('rent')->nullable(false);
            $table->text('description')->nullable(false);
            $table->string('user_id')->nullable(false);
            $table->text('house_rules')->nullable(false);
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
        Schema::dropIfExists('rooms');
    }
}
