<?php

return [
    'name' => 'Easy Marriage Georgia',
    'tagline' => 'A simpler way to say I do.',
    'domain' => 'easymarriagegeorgia.com',
    'url' => env('APP_URL', 'https://easymarriagegeorgia.com'),
    'email' => env('CONTACT_EMAIL'),
    'notify_email' => env('NOTIFY_EMAIL', env('CONTACT_EMAIL')),
    'phone' => env('CONTACT_PHONE'),
    'whatsapp' => env('CONTACT_WHATSAPP'),
    'social' => [
        'instagram' => env('SOCIAL_INSTAGRAM'),
        'telegram' => env('SOCIAL_TELEGRAM'),
    ],
];
