<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('expansion_id');
            $table->unsignedInteger('faction_id');

            $table->enum('type', ['hero', 'construct', 'monster']);
            $table->string('uuid');
            $table->string('name');
            $table->text('effect')->nullable();
            $table->text('quote')->nullable();
            $table->unsignedInteger('honor')->default(0);
            $table->unsignedInteger('cost')->default(0);
            $table->unsignedInteger('quantity')->default(1);

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
        Schema::drop('cards');
    }
}
