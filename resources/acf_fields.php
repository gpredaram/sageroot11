<?php

/**
 * Save ACF JSON to custom directory in the theme.
 */
add_filter('acf/settings/save_json', function () {
    return theme_path('/acf_json');
});

/**
 * Load ACF JSON from custom directory in the theme.
 */
add_filter('acf/settings/load_json', function ($paths) {
    // Remove default path (optional)
    unset($paths[0]);

    $paths[] = theme_path('/acf_json');

    return $paths;
});

/**
 * Auto-sync ACF JSON.
 */
// add_action('init', 'auto_sync_acf');
function auto_sync_acf()
{
    if (empty($_POST) || ($_POST['post_type'] ?? '') !== 'acf-field-group') {
        update_json('acf-field-group');
    }

    if (empty($_POST) || ($_POST['post_type'] ?? '') !== 'acf-post-type') {
        update_json('acf-post-type');
    }

    if (empty($_POST) || ($_POST['post_type'] ?? '') !== 'acf-taxonomy') {
        update_json('acf-taxonomy');
    }
}

function update_json($post_type)
{
    $groups = acf_get_internal_post_type_posts($post_type);
    if (empty($groups)) {
        return;
    }

    $sync = [];

    foreach ($groups as $group) {
        $local    = $group['local'] ?? false;
        $modified = $group['modified'] ?? 0;
        $private  = $group['private'] ?? false;

        if ($local !== 'json' || $private) {
            continue;
        }

        if (!$group['ID']) {
            $sync[$group['key']] = $group;
        } elseif ($modified && $modified != get_post_modified_time('U', true, $group['ID'], true)) {
            $sync[$group['key']] = $group;
        }
    }

    if (!empty($sync)) {
        acf_update_setting('json', false);

        $files = acf_get_local_json_files($post_type);

        foreach ($sync as $key => $post) {
            if (!isset($files[$key])) {
                continue;
            }

            $local_post       = json_decode(file_get_contents($files[$key]), true);
            $local_post['ID'] = $post['ID'];

            acf_import_internal_post_type($local_post, $post_type);
        }
    }
}

/**
 * Collapse all ACF layouts and postboxes by default in admin.
 */
add_action('acf/input/admin_head', function () {
    echo <<<HTML
<script type="text/javascript">
    (function($) {
        $(document).ready(function(){
            $('.layout').addClass('-collapsed');
            $('.acf-postbox').addClass('closed');
        });
    })(jQuery);
</script>
HTML;
});