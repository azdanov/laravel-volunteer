<?php

declare(strict_types=1);

namespace App\Providers;

use Braintree\Configuration;
use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class BraintreeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
    }

    /**
     * @throws \Braintree\Exception\Configuration
     */
    public function register(): void
    {
        $config = new Configuration([
            'environment' => config('volunteer.braintree.environment'),
            'merchantId' => config('volunteer.braintree.merchantId'),
            'publicKey' => config('volunteer.braintree.publicKey'),
            'privateKey' => config('volunteer.braintree.privateKey'),
        ]);

        $this->app->singleton(Gateway::class, static function () use ($config) {
            return new Gateway($config);
        });
    }
}
