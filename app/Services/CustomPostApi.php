<?php

namespace App\Services;

class CustomPostApi
{
    public static function registerRoutes()
    {
        register_rest_route('custom/v1', '/posts', [
            'methods'  => 'GET',
            'callback' => [self::class, 'getPosts'],
            'permission_callback' => '__return_true',
            'args' => [
                'categoria' => [
                    'required' => false,
                    'sanitize_callback' => 'sanitize_text_field',
                ],
            ],
        ]);
    }

    public static function getPosts($request)
    {
        $categoria = $request->get_param('categoria');

        $args = [
            'post_type'      => 'post',
            'posts_per_page' => 5,
        ];

        if ($categoria) {
            $args['category_name'] = $categoria;
        }

        $query = new \WP_Query($args);

        $posts = array_map(function ($post) {
            return [
                'id'    => $post->ID,
                'title' => get_the_title($post),
                'link'  => get_permalink($post),
            ];
        }, $query->posts);

        return rest_ensure_response($posts);
    }
}