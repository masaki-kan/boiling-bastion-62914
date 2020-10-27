<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title')->nullable();
            $table->longText('file')->nullable();
            $table->longText('file_path')->nullable();
            $table->string('grandfather')->nullable();
            $table->string('grandmother')->nullable();
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->string('son_first_man')->nullable();
            $table->string('son_first_woman')->nullable();
            $table->string('son_second_man')->nullable();
            $table->string('son_second_woman')->nullable();
            $table->string('son_third_man')->nullable();
            $table->string('son_third_woman')->nullable();
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
        Schema::dropIfExists('images');
    }
}
