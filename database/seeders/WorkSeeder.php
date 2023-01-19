<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('works')->insert([
            'worktype' => '草取り',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        DB::table('works')->insert([
            'worktype' => '腐れ取り',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        DB::table('works')->insert([
            'worktype' => '除雪',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
    }
}
