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
            ]);
        
    }
}
