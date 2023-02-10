<?php
namespace Deegitalbe\LaravelTrustupIoMessagingWebhooksListener\Tests;

use Deegitalbe\LaravelTrustupIoMessagingWebhooksListener\Package;
use Henrotaym\LaravelPackageVersioning\Testing\VersionablePackageTestCase;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListener\Providers\LaravelTrustupIoMessagingWebhooksListenerServiceProvider;

class TestCase extends VersionablePackageTestCase
{
    public static function getPackageClass(): string
    {
        return Package::class;
    }
    
    public function getServiceProviders(): array
    {
        return [
            LaravelTrustupIoMessagingWebhooksListenerServiceProvider::class
        ];
    }
}