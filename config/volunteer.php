<?php

declare(strict_types=1);

return [
    'default' => [
        'region' => 'estonia',
        'listing_pagination' => 10,
        'email' => 'hello@volunteer.com',
        'featured_price' => 7,
    ],
    'braintree' => [
        'environment' => env('BRAINTREE_ENVIRONMENT', 'sandbox'),
        'merchantId' => env('BRAINTREE_MERCHANT_ID', 'merchant_id'),
        'publicKey' => env('BRAINTREE_PUBLIC_KEY', 'your_public_key'),
        'privateKey' => env('BRAINTREE_PRIVATE_KEY', 'your_private_key'),
    ],
];
