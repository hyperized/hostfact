<?php

// Ensure to whitelist the application IP!

return [
    // Full URI to api.php location
    'api_v2_url' => env('WEFACT_URL', 'https://yoursite.tld/Pro/apiv2/api.php'),

    // Token provided as 'Beveiligingscode'
    'api_v2_key' => env('WEFACT_KEY', 'token'),

    // Timeout in seconds
    'api_v2_timeout' => 10,
];
