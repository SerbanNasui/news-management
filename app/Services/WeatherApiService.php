<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class WeatherApiService{

    public function getWeather(){
        $cities = [
            [
                'name' => 'Bucharest',
                'aqi' => 'no',
            ],
            [
                'name' => 'Brasov',
                'aqi' => 'no',
            ],
            [
                'name' => 'Cluj-Napoca',
                'aqi' => 'no',
            ],
            [
                'name' => 'Constanta',
                'aqi' => 'no',
            ],
            [
                'name' => 'Galati',
                'aqi' => 'no',
            ],
            [
                'name' => 'Iasi',
                'aqi' => 'no',
            ],
        ];
        foreach ($cities as $city) {
            $response[] = $this->getWeatherApi($city['name'], $city['aqi']);
        }
        return $response;
    }

    private function getWeatherApi($city,$aqi){
        $apiKey = env('WEATHER_API_KEY');
        $apiUrl = 'http://api.weatherapi.com/v1/current.json?key='.$apiKey.'&q='.$city.'&aqi='.$aqi;
        $response = Http::get($apiUrl);
        return json_decode($response->body());
    }
}
