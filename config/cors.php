<?php

return [
    'paths' => ['api/*'],  // Add any paths you want to allow CORS on, like 'students'
    'allowed_methods' => ['*'],        // Allow all HTTP methods (GET, POST, PUT, DELETE, etc.)
    'allowed_origins' => ['*'],        // Allow all origins (replace '*' with specific domains in production)
    'allowed_headers' => ['*'],        // Allow all headers
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];
