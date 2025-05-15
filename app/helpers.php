<?php

if (! function_exists('vite')) {
  function vite($asset)
  {
    $manifest = json_decode(file_get_contents(get_theme_file_path('public/build/manifest.json')), true);

    if (! isset($manifest[$asset])) {
      return;
    }

    $url = get_theme_file_uri('public/build/' . $manifest[$asset]['file']);

    if (str_ends_with($asset, '.css')) {
      echo '<link rel="stylesheet" href="' . $url . '">' . PHP_EOL;
    }

    if (str_ends_with($asset, '.js')) {
      echo '<script type="module" src="' . $url . '"></script>' . PHP_EOL;
    }
  }
}