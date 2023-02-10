<?php
namespace Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Tests;

use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Package;
use Henrotaym\LaravelPackageVersioning\Testing\VersionablePackageTestCase;
use Deegitalbe\ServerAuthorization\Providers\ServerAuthorizationServiceProvider;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Providers\LaravelTrustupIoMessagingWebhooksListenersServiceProvider;

class TestCase extends VersionablePackageTestCase
{
    public static function getPackageClass(): string
    {
        return Package::class;
    }
    
    public function getServiceProviders(): array
    {
        return [
            ServerAuthorizationServiceProvider::class,
            LaravelTrustupIoMessagingWebhooksListenersServiceProvider::class,
        ];
    }
}