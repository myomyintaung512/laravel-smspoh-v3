<?php

return [
    'api_key' => env('SMSPOH_API_KEY', ''),
    'api_secret' => env('SMSPOH_API_SECRET', ''),
    'sender_id' => env('SMSPOH_SENDER_ID', ''),
    'base_url' => env('SMSPOH_BASE_URL', 'https://v3.smspoh.com/api/rest'),
];
