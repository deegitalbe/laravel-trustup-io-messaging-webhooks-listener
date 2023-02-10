<?php
namespace Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners;

use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\PackageContract;
use Henrotaym\LaravelPackageVersioning\Services\Versioning\VersionablePackage;

class Package extends VersionablePackage implements PackageContract
{
    public static function prefix(): string
    {
        return "laravel-trustup-io-messaging-webhooks-listeners";
    }
}