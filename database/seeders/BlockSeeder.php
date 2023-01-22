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
        for($i = 0 ; $i<30; ++$i){
            $numbers[] = array(
                'column_number' => $i ,
                'name' => "1-$i",
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
