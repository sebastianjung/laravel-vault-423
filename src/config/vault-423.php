<?php

return [

    // comma separated passwords
    // if no string is provided protection will be disabled
    'passwords' => env('VAULT_423_PASSWORDS'),

    // whitelisted ips
    // e.g. ['192.168.0.1']
    'whitelist' => [],

    'customization' => [

        'meta_title' => config('app.name'),

        // if path is given custom logo will be used
        // looks at 'public/img/...'
        // e.g. logo.svg, logo.jpg, logo.png
        'logo_path' => '',

        // value as max-width and -height in px (e.g. 40px x 40px)
        'logo_size' => 40,

        'text_typewriter_part_one' => 'Hier wird',

        'text_typewriter_part_two' => ['entwickelt.', 'das Passwort eingegeben.', 'Herzblut reingesteckt.', 'Großes erschaffen!'],

        'bottom_left_text' => 'www.ultrabold.de',

        'bottom_left_link' => 'http://www.ultrabold.com',

        'background_color' => 'rgb(224, 221, 0)',

        'font_color' => 'white',

        'font_family' => [
            'link' => 'https://fonts.googleapis.com/css?family=Fira+Mono',
            
            'name' => 'Fira Mono'
        ],

        'custom_css' => '
            // h1 {
            //     color: red !important;
            // }
        '
    ]
];