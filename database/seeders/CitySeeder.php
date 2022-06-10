<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city=Province::first();
        $data=[
            ['name'=>'LUBUMBASHI','province_id'=>$city->id],
            ['name'=>'KASUMBALESA','province_id'=>$city->id],
            ['name'=>"LIKASI",'province_id'=>$city->id]
        ];
        City::insert($data);
    }
}
