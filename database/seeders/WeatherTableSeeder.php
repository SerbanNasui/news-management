<?php

namespace Database\Seeders;

use App\Models\Weather;
use App\Services\WeatherApiService;
use Illuminate\Database\Seeder;

class WeatherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $galati = (new WeatherApiService())->getWeather('Galati', 'no');
        if($galati != 'error'){
            Weather::firstOrCreate(['city' => 'Galati'],[
                'city' => 'Galati',
                'info_data' => json_encode($galati),
            ]);
        }

        $bucuresti = (new WeatherApiService())->getWeather('Bucuresti', 'ro');
        if($bucuresti != 'error') {
            Weather::firstOrCreate(['city' => 'Bucuresti'], [
                'city' => 'Bucuresti',
                'info_data' => json_encode($bucuresti),
            ]);
        }

        $craiova = (new WeatherApiService())->getWeather('Craiova', 'ro');
        if($craiova != 'error'){
            Weather::firstOrCreate(['city' => 'Craiova'],[
                'city' => 'Craiova',
                'info_data' => json_encode($craiova),
            ]);
        }

        $iasi = (new WeatherApiService())->getWeather('Iasi', 'ro');
        if($iasi != 'error'){
            Weather::firstOrCreate(['city' => 'Iasi'],[
                'city' => 'Iasi',
                'info_data' => json_encode($iasi),
            ]);
        }

        $oradea = (new WeatherApiService())->getWeather('Oradea', 'ro');
        if($oradea != 'error'){
            Weather::firstOrCreate(['city' => 'Oradea'],[
                'city' => 'Oradea',
                'info_data' => json_encode($oradea),
            ]);
        }

        $timisoara = (new WeatherApiService())->getWeather('Timisoara', 'ro');
        if($timisoara != 'error'){
            Weather::firstOrCreate(['city' => 'Timisoara'],[
                'city' => 'Timisoara',
                'info_data' => json_encode($timisoara),
            ]);
        }

        $constanta = (new WeatherApiService())->getWeather('Constanta', 'ro');
        if($constanta != 'error'){
            Weather::firstOrCreate(['city' => 'Constanta'],[
                'city' => 'Constanta',
                'info_data' => json_encode($constanta),
            ]);
        }

        $brasov = (new WeatherApiService())->getWeather('Brasov', 'ro');
        if($brasov != 'error'){
            Weather::firstOrCreate(['city' => 'Brasov'],[
                'city' => 'Brasov',
                'info_data' => json_encode($brasov),
            ]);
        }

        $cluj = (new WeatherApiService())->getWeather('Cluj-Napoca', 'ro');
        if($cluj != 'error'){
            Weather::firstOrCreate(['city' => 'Cluj-Napoca'],[
                'city' => 'Cluj-Napoca',
                'info_data' => json_encode($cluj),
            ]);
        }

        $sibiu = (new WeatherApiService())->getWeather('Sibiu', 'ro');
        if($sibiu != 'error'){
            Weather::firstOrCreate(['city' => 'Sibiu'],[
                'city' => 'Sibiu',
                'info_data' => json_encode($sibiu),
            ]);
        }

        $braila = (new WeatherApiService())->getWeather('Braila', 'ro');
        if($braila != 'error'){
            Weather::firstOrCreate(['city' => 'Braila'],[
                'city' => 'Braila',
                'info_data' => json_encode($braila),
            ]);
        }

        $baiaMare = (new WeatherApiService())->getWeather('Baia Mare', 'ro');
        if($baiaMare != 'error'){
            Weather::firstOrCreate(['city' => 'Baia Mare'],[
                'city' => 'Baia Mare',
                'info_data' => json_encode($baiaMare),
            ]);
        }
    }
}
