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
            // e.g. adobe font: 'https://use.typekit.net/XYZ.css',
            'link' => 'https://fonts.googleapis.com/css?family=Fira+Mono', // google font
            
            // e.g. adobe fonts: 'ff-tisa-sans-web-pro' or 'ff-dax-pro'
            'name' => 'Fira Mono'
        ],

        'font_family_bottom_left' => [
            // can be left blank if two fonts are provided by the link above
            'link' => '',
            
            'name' => ''
        ],

        'custom_css' => '
            // body {
            //     background-image: url(/img/koj7cxt.jpg);
            // }
        '
    ]
];