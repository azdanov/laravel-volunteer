<?php

declare(strict_types=1);

return [
    'meta'      => [
        'defaults'       => [
            'title'        => config('app.name'),
            'description'  => config('volunteer.default.description'),
            'separator'    => ' - ',
            'keywords'     => [],
            'canonical'    => false,
        ],

        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],
    ],
    'opengraph' => [
        'defaults' => [
            'title'       => config('app.name'),
            'description' => config('volunteer.default.description'),
            'url'         => false,
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter' => [
        'defaults' => [
          //'card'        => 'summary',
          //'site'        => '@LuizVinicius73',
        ],
    ],
];
