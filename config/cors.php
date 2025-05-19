<?php

return [

'paths' => ['api/*', 'sanctum/csrf-cookie'],

'allowed_methods' => ['*'], // oppure ['GET', 'POST', 'PUT', 'DELETE']

'allowed_origins' => ['http://localhost:5174'], // oppure ['https://example.com']

'allowed_origins_patterns' => [],

'allowed_headers' => ['*'],

'exposed_headers' => [],

'max_age' => 0,

'supports_credentials' => false,

];