<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //
        DB::table('images')->insert(
          [
        [
          'id' => 1,
          'user_id' => 1,
          'title' => '家族写真',
          'file' => '家族写真1.png',
        ],
        [
          'id' => 2,
          'user_id' => 2,
          'title' => '家族写真',
          'file' => '家族写真2.png',
        ],
        [
          'id' => 3,
          'user_id' => 3,
          'title' => '家族写真',
          'file' => '家族写真2.png',
        ],
      ]);
    }
}
