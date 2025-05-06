<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\ApiService;

class WeatherSearchComponent extends Component
{
    public string $city = '';
    public array $weather = [];
    public string $error = '';
    public bool $loading = false;

    protected ApiService $api;

    public function boot()
    {
        $this->api = app(ApiService::class);
    }

    public function searchCity()
    {
        $this->reset('weather', 'error');
        $this->loading = true;

        $coords = $this->resolveCityToCoords($this->city);
        if (!$coords) {
            $this->error = 'City not supported or not found.';
            $this->loading = false;
            return;
        }

        $data = $this->api->getWeather($coords['lat'], $coords['lon']);
        $this->weather = $data['current_weather'] ?? [];
        $this->error = $data['error'] ?? '';
        $this->loading = false;
    }

    private function resolveCityToCoords(string $city): ?array
    {
        return match(strtolower($city)) {
            'raleigh' => ['lat' => 35.7796, 'lon' => -78.6382],
            'new york' => ['lat' => 40.7128, 'lon' => -74.0060],
            'san francisco' => ['lat' => 37.7749, 'lon' => -122.4194],
            default => null
        };
    }

    public function getWeatherTheme(): string
    {
        $temp = $this->weather['temperature'] ?? null;
    
        if (is_null($temp)) return 'default';
    
        return $temp >= 20 ? 'hot' : ($temp <= 10 ? 'cold' : 'mild');
    }    

    public function render()
    {
        return view('livewire.weather-search-component');
    }
}
