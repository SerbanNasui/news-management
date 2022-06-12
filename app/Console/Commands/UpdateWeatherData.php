<?php

namespace App\Console\Commands;

use App\Models\Weather;
use App\Services\WeatherApiService;
use Illuminate\Console\Command;

class UpdateWeatherData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'UpdateWeatherData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $cities = Weather::all();
        foreach ($cities as $city) {
            if($city->updated_at->diffInMinutes() > 5) {
                $getWeather = (new WeatherApiService())->getWeather($city->city, $city->aqi);
                if($getWeather != 'error') {
                    $city->info_data = json_encode($getWeather);
                    $city->save();
                }
            }
        }
        return 0;
    }
}
