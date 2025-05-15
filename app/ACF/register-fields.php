<?php

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group([
        'key' => 'group_example',
        'title' => 'Ejemplo',
        'fields' => [
            [
                'key' => 'field_text_example',
                'label' => 'Texto de ejemplo',
                'name' => 'text_example',
                'type' => 'text',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ],
            ],
        ],
    ]);
}