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
        Weather::firstOrCreate(['name' => 'Galati'],[
            'city' => 'Galati',
            'info_data' => (new WeatherApiService())->getWeather('Galati', 'no'),
        ]);

        Weather::firstOrCreate(['name' => 'Bucuresti'],[
            'city' => 'Bucuresti',
            'info_data' => (new WeatherApiService())->getWeather('Bucuresti', 'no'),
        ]);

        Weather::firstOrCreate(['name' => 'Constanta'],[
            'city' => 'Constanta',
            'info_data' => (new WeatherApiService())->getWeather('Constanta', 'no'),
        ]);

        Weather::firstOrCreate(['name' => 'Brasov'],[
            'city' => 'Brasov',
            'info_data' => (new WeatherApiService())->getWeather('Brasov', 'no'),
        ]);

        Weather::firstOrCreate(['name' => 'Iasi'],[
            'city' => 'Iasi',
            'info_data' => (new WeatherApiService())->getWeather('Iasi', 'no'),
        ]);

        Weather::firstOrCreate(['name' => 'Timisoara'],[
            'city' => 'Timisoara',
            'info_data' => (new WeatherApiService())->getWeather('Timisoara', 'no'),
        ]);

        Weather::firstOrCreate(['name' => 'Craiova'],[
            'city' => 'Craiova',
            'info_data' => (new WeatherApiService())->getWeather('Craiova', 'no'),
        ]);

        Weather::firstOrCreate(['name' => 'Baia Mare'],[
            'city' => 'Baia Mare',
            'info_data' => (new WeatherApiService())->getWeather('Baia Mare', 'no'),
        ]);

        Weather::firstOrCreate(['name' => 'Oradea'],[
            'city' => 'Oradea',
            'info_data' => (new WeatherApiService())->getWeather('Oradea', 'no'),
        ]);

        Weather::firstOrCreate(['name' => 'Braila'],[
            'city' => 'Braila',
            'info_data' => (new WeatherApiService())->getWeather('Braila', 'no'),
        ]);

        Weather::firstOrCreate(['name' => 'Sibiu'],[
            'city' => 'Sibiu',
            'info_data' => (new WeatherApiService())->getWeather('Sibiu', 'no'),
        ]);
    }
}
