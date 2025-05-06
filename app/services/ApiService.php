<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;

class ApiService
{
    protected string $baseUrl = 'https://api.open-meteo.com/v1/forecast';

    public function getWeather(float $lat, float $lon): array
    {
        try {
            $response = Http::get($this->baseUrl, [
                'latitude' => $lat,
                'longitude' => $lon,
                'current_weather' => true,
            ]);

            if ($response->failed()) {
                throw new Exception('API request failed');
            }

            return $response->json();
        } catch (Exception $e) {
            return [
                'error' => $e->getMessage(),
            ];
        }
    }
}
