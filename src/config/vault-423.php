<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Vault 423 Config
    |--------------------------------------------------------------------------
    |
    | 
    | 
    |
 */

    // comma separated passwords
    // if no string is provided protection will be disabled
    'passwords' => env('VAULT_423_PASSWORDS'),

    // whitelisted ips
    // expects ARRAY
    'whitelist' => [],

    // if path is given custom logo will be used
    'custom_logo_path' => ''

];