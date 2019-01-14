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
        
        // stands still
        'text_typewriter_part_one' => 'Hier wird',
        
        // keeps looping
        'text_typewriter_part_two' => ['entwickelt.', 'das Passwort eingegeben.', 'Herzblut reingesteckt.', 'Großes erschaffen!'],

        'incorrect_password' => 'falsches Kennwort',

        'bottom_left_text' => 'www.ultrabold.de',

        'bottom_left_link' => 'http://www.ultrabold.com',

        'background_color' => 'rgb(224, 221, 0)',

        'font_color' => 'white',

        'font_family' => [
            // e.g. adobe font: 'https://use.typekit.net/koj7cxt.css',
            'link' => 'https://use.typekit.net/koj7cxt.css', // google font
            
            // e.g. adobe fonts: 'ff-tisa-sans-web-pro' or 'ff-dax-pro'
            'name' => 'ff-tisa-sans-web-pro'
        ],

        // font family for bottom left section, incorrect password error text and error icon
        'font_family_secondary' => [
            // can be left blank if two fonts are provided by the link above
            'link' => '',
            
            'name' => 'ff-dax-pro'
        ],

        'custom_css' => '
            // body {
            //     background-image: url(/img/koj7cxt.jpg);
            // }
        '
    ]
];