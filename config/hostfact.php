<?php

// Ensure to whitelist the application IP in the Hostfact interface

return [
    // Full URI to api.php location, like: 'https://yoursite.tld/Pro/apiv2/api.php'
    'api_v3_url' => env('HOSTFACT_URL'),

    // Token provided as 'Beveiligingscode'
    'api_v3_key' => env('HOSTFACT_KEY'),

    // Timeout in seconds
    'api_v3_timeout' => env('HOSTFACT_TIMEOUT', 20),
];
