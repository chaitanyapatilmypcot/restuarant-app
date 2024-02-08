<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert(
        [
            'name' =>Str::random(10),
            'email' =>Str::random(10) . "@gmail.com",
            'address' => Str::random(20) . ", India",
        ],
        [
            'name' =>Str::random(10),
            'email' =>Str::random(10) . "@gmail.com",
            'address' => Str::random(20) . ", India",
        ],
        [
            'name' =>Str::random(10),
            'email' =>Str::random(10) . "@gmail.com",
            'address' => Str::random(20) . ", India",
        ],
        [
            'name' =>Str::random(10),
            'email' =>Str::random(10) . "@gmail.com",
            'address' => Str::random(20) . ", India",
        ],
        [
            'name' =>Str::random(10),
            'email' =>Str::random(10) . "@gmail.com",
            'address' => Str::random(20) . ", India",
        ],
        [
            'name' =>Str::random(10),
            'email' =>Str::random(10) . "@gmail.com",
            'address' => Str::random(20) . ", India",
        ],
    );
    }
}
