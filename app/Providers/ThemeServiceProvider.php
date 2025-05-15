<?php

namespace App\Providers;

use Roots\Acorn\Sage\SageServiceProvider;

class ThemeServiceProvider extends SageServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // ACF JSON: guardar en /acf_json
        add_filter('acf/settings/save_json', function () {
            return get_theme_file_path('/acf_json');
        });

        // ACF JSON: cargar desde /acf_json
        add_filter('acf/settings/load_json', function ($paths) {
            unset($paths[0]); // Quitar el path por defecto
            $paths[] = get_theme_file_path('/acf_json');
            return $paths;
        });

        // Colapsar campos ACF por defecto en el admin
        add_action('acf/input/admin_head', function () {
            echo <<<HTML
                <script>
                    (function($){
                        $(document).ready(function(){
                            $('.layout').addClass('-collapsed');
                            $('.acf-postbox').addClass('closed');
                        });
                    })(jQuery);
                </script>
            HTML;
        });

        // Cargar todos los archivos de campos ACF en app/ACF/
        foreach (glob(get_theme_file_path('/app/ACF/*.php')) as $acf_file) {
            require_once $acf_file;
        }
    }

    
}
