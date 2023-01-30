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
        DB::table('blocks')->delete();
        
        for($i = 1 ; $i<=40; ++$i){
            $numbers[] = array(
                'column_number' => $i ,
                'name' => "NE-$i",
                'year' => 2022,
                'crop' => '玉ねぎ',
                'weed' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            );
        }
        
        for($i = 1 ; $i<=40; ++$i){
            $numbers[] = array(
                'column_number' => $i ,
                'name' => "SE-$i",
                'year' => 2022,
                'crop' => '玉ねぎ',
                'weed' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            );
        }
        
        for($i = 1 ; $i<=20; ++$i){
            $numbers[] = array(
                'column_number' => $i ,
                'name' => "NW-$i",
                'year' => 2022,
                'crop' => '玉ねぎ',
                'weed' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            );
        }
        
        for($i = 1 ; $i<=20; ++$i){
            $numbers[] = array(
                'column_number' => $i ,
                'name' => "SW-$i",
                'year' => 2022,
                'crop' => '玉ねぎ',
                'weed' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            );
        }
        
        foreach ($numbers as $number){
            DB::table('blocks')->insert($number);
        }
    }
}
