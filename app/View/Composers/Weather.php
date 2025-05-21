<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Illuminate\Support\Facades\Http;

class Weather extends Composer
{
    protected static $views = [
        'partials.weather', 
    ];

    public function with()
    {
        return [
            'weatherData' => $this->getWeatherData(),
        ];
    }

    protected function getWeatherData()
    {
        try {
            $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
                'q' => 'Madrid',
                'appid' => config('services.openweather.key'),
                'units' => 'metric',
                'lang' => 'es',
            ]);

            return $response->successful()
                ? $response->json()
                : ['error' => 'Error al obtener datos del clima.'];
        } catch (\Exception $e) {
            return ['error' => 'No se pudo conectar a la API.'];
        }
    }
}