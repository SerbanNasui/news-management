<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class WeatherApiService{

    public function getWeather($city, $aqi){

        $response = $this->getWeatherApi($city, $aqi);
        if(isset($response->error)){
            return 'error';
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
