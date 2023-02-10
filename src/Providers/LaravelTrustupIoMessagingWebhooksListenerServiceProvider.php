<?php
namespace Deegitalbe\LaravelTrustupIoMessagingWebhooksListener\Providers;

use Deegitalbe\LaravelTrustupIoMessagingWebhooksListener\Package;
use Henrotaym\LaravelPackageVersioning\Providers\Abstracts\VersionablePackageServiceProvider;

class LaravelTrustupIoMessagingWebhooksListenerServiceProvider extends VersionablePackageServiceProvider
{
    public static function getPackageClass(): string
    {
        return Package::class;
    }

    protected function addToRegister(): void
    {
        //
    }

    protected function addToBoot(): void
    {
        //
    }
}