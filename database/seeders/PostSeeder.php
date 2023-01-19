<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'start_time' => '2022-01-09 10:00:00',
            'end_time' => '2022-01-09 12:00:00',
            'comment' => 'SAMPLE COMMENT',
            'updated_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => '1',
            'work_id' => '1',
            'block_id' => '1'
            ]);
        DB::table('posts')->insert([
            'start_time' => '2022-01-09 10:00:00',
            'end_time' => '2022-01-09 12:00:00',
            'comment' => 'SAMPLE COMMENT2',
            'updated_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => '1',
            'work_id' => '2',
            'block_id' => '2'
            ]);
    }
}
