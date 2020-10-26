<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    DB::table('names')->insert([
      [
        'id' => 1,
        'user_id' => 1,
        'grandfather' => 'おじいちゃん',
        'grandmother' => 'おばあちゃん',
        'father' => 'お父ちゃん',
        'mother' => 'お母ちゃん',
        'son_first_man' => '長男',
        'son_first_woman' => '長女',
        'son_second_man' => '次男',
        'son_second_woman' => '次女',
        'son_third_man' => '三男',
        'son_third_woman' => '三女',
      ],
      [
        'id' => 2,
        'user_id' => 2,
        'grandfather' => 'おじいちゃん',
        'grandmother' => 'おばあちゃん',
        'father' => 'お父ちゃん',
        'mother' => 'お母ちゃん',
        'son_first_man' => '長男',
        'son_first_woman' => '長女',
        'son_second_man' => '次男',
        'son_second_woman' => '次女',
        'son_third_man' => '三男',
        'son_third_woman' => '三女',
      ],
    ]);
    }
}
