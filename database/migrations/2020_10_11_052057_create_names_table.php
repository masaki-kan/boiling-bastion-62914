<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('names', function (Blueprint $table) {
          $table->id();
          $table->integer('user_id');
          //nullable nullを許容する
          $table->string( 'grandfather' )->nullable();
          $table->string('grandfather_img')->nullable();
          $table->longText('grandfather_img_path')->nullable();

          $table->string( 'grandmother' )->nullable();
          $table->string('grandmother_img')->nullable();
          $table->longText('grandmother_img_path')->nullable();

          $table->string( 'father' )->nullable();
          $table->string('father_img')->nullable();
          $table->longText('father_img_path')->nullable();

          $table->string( 'mother' )->nullable();
          $table->string('mother_img')->nullable();
          $table->longText('mother_img_path')->nullable();

          $table->string( 'son_first_man' )->nullable();
          $table->string('son_first_man_img')->nullable();
          $table->longText('son_first_man_img_path')->nullable();

          $table->string( 'son_first_woman' )->nullable();
          $table->string('son_first_woman_img')->nullable();
          $table->longText('son_first_woman_img_path')->nullable();

          $table->string( 'son_second_man' )->nullable();
          $table->string('son_second_man_img')->nullable();
          $table->longText('son_second_man_img_path')->nullable();

          $table->string( 'son_second_woman' )->nullable();
          $table->string('son_second_woman_img')->nullable();
          $table->longText('son_second_woman_img_path')->nullable();

          $table->string( 'son_third_man' )->nullable();
          $table->string('son_third_man_img')->nullable();
          $table->longText('son_third_man_img_path')->nullable();

          $table->string( 'son_third_woman' )->nullable();
          $table->string('son_third_woman_img')->nullable();
          $table->longText('son_third_woman_img_path')->nullable();

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
        Schema::dropIfExists('names');
    }
}
