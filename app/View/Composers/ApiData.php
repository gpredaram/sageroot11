<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Illuminate\Support\Facades\Http;

class ApiData extends Composer
{
    protected static $views = [
        'partials.content-api', // blade donde se usará
    ];

    public function with()
    {
        return [
            'apiItems' => $this->getApiItems(),
        ];
    }

    protected function getApiItems()
    {
        try {
            $response = Http::get('https://jsonplaceholder.typicode.com/posts?_limit=5');

            if ($response->successful()) {
                return $response->json(); // Devuelve un array asociativo
            }

            return [];
        } catch (\Exception $e) {
            return ['error' => 'Error al conectar con la API.'];
        }
    }
}