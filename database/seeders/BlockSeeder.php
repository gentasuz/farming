<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Datetime;

class BlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blocks')->insert([
            'column_number' => '1',
            'name' => '1-1',
            'year' => '2022',
            'crop' => '玉ねぎ',
            'weed' => '5',
            'area' => '10',
            'comment' => '雑草多い',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
            
        DB::table('blocks')->insert([
            'column_number' => '2',
            'name' => '1-2',
            'year' => '2022',
            'crop' => '玉ねぎ',
            'weed' => '2',
            'area' => '100',
            'comment' => '雑草普通',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
            
    }
}
