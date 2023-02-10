<?php
namespace Deegitalbe\LaravelTrustupIoMessagingWebhooksListener\Facades;

use Deegitalbe\LaravelTrustupIoMessagingWebhooksListener\Package as Underlying;
use Henrotaym\LaravelPackageVersioning\Facades\Abstracts\VersionablePackageFacade;

class Package extends VersionablePackageFacade
{
    public static function getPackageClass(): string
    {
        return Underlying::class;
    }
}