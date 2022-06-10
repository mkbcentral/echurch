<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coutry=Country::first();
        $data=[
            ['name'=>'HAUT-KATANGA','country_id'=>$coutry->id],
            ['name'=>'KINSHASA','country_id'=>$coutry->id],
            ['name'=>"NORD KIBU",'country_id'=>$coutry->id]
        ];
        Province::insert($data);
    }
}
