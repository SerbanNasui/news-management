<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use App\Services\WeatherApiService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index(){

        $weather = Weather::withTrashed()->get();
        return view('back-office.weather.index', compact('weather'));
    }

    public function store(Request $request){
        $request->validate([
            'city' => 'required|unique:weather,city',
        ]);

        $response = (new WeatherApiService())->getWeather($request->city, 'no');
        if($response == 'error') {
            toastr()->error('Something went wrong!');
            return redirect()->back();
        }
        Weather::create([
            'city' => ucfirst($request->city),
            'info_data' => json_encode($response),
        ]);

        toastr()->success('City added successfully!');
        return redirect()->back();
    }

    public function delete($id){
        $weather = Weather::find($id);
        $weather->delete();
        toastr()->success('City deleted successfully!');
        return redirect()->back();
    }

    public function restore($id){
        $weather = Weather::withTrashed()->find($id);
        $weather->restore();
        $response = (new WeatherApiService())->getWeather($weather->city, 'no');
        if($response == 'error') {
            toastr()->error('Something went wrong!');
            return redirect()->back();
        }
        $weather->info_data = json_encode($response);
        $weather->save();
        toastr()->success('City restored successfully!');
        return redirect()->back();
    }

    public function destroy($id){
        $weather = Weather::withTrashed()->find($id);
        $weather->forceDelete();
        toastr()->success('City deleted successfully!');
        return redirect()->back();
    }
}
