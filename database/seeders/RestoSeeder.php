<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

//Current Timestamp
use Carbon\Carbon;

class RestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    


    public function run()
    {
        $datas = array(
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
            ]);

        foreach($datas as $data) {
            DB::table('restaurants')->insert(
                [
                    'name' => $data['name'],
                    'email' =>$data['email'],
                    'address' => $data['address'],
                    'created_at' => Carbon::now(),
                ]
            );
        }
        
    }
}
