<?php

namespace App\Http\Controllers;

use App\Services\ApiService;

class WeatherController extends Controller
{
    protected ApiService $api;

    public function __construct(ApiService $api)
    {
        $this->api = $api;
    }

    public function index()
    {
        // Testing for Raleigh, NC using it's coordinates
        $data = $this->api->getWeather(35.7796, -78.6382);

        return view('welcome', [
            'weather' => $data['current_weather'] ?? null,
            'error' => $data['error'] ?? null,
        ]);
    }
}
