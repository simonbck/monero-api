<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MoneroIntegrations\MoneroPhp\walletRPC;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(walletRPC::class, function () {
            $walletRPC = new walletRPC(
                config('wallet_rpc.wallet_rpc_host'),
                config('wallet_rpc.wallet_rpc_port'),
                config('wallet_rpc.wallet_rpc_ssl')
            );
            $walletRPC->open_wallet(
                config('wallet_rpc.wallet_rpc_wallet'),
                config('wallet_rpc.wallet_rpc_wallet_password')
            );

            return $walletRPC;
        });
    }
}
