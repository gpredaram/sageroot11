<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Manifest Path
    |--------------------------------------------------------------------------
    |
    | Define el path absoluto al manifest.json generado por Vite. Esto es lo
    | que el helper vite() necesita para funcionar correctamente.
    |
    */

    'manifest' => get_theme_file_path('public/build/manifest.json'),

    /*
    |--------------------------------------------------------------------------
    | Dev Server
    |--------------------------------------------------------------------------
    |
    | Opcionalmente puedes configurar aquí la URL del servidor de desarrollo
    | si trabajas con `npm run dev`.
    |
    */

    'dev' => env('WP_ENV') === 'development',

];