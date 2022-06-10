<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['name'=>'R.D Congo'],
            ['name'=>'Cameroun'],
            ['name'=>"Cote d'ivoire"]
        ];
        Country::insert($data);
    }
}
