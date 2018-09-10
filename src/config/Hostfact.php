<?php

// Ensure to whitelist the application IP!

return [
    // Full URI to api.php location
    'api_v2_url' => env('HOSTFACT_URL', 'https://yoursite.tld/Pro/apiv2/api.php'),

    // Token provided as 'Beveiligingscode'
    'api_v2_key' => env('HOSTFACT_KEY', 'token'),

    // Timeout in seconds
    'api_v2_timeout' => env('HOSTFACT_TIMEOUT', 20),
];
