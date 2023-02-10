<?php
namespace Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Facades;

use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Package as Underlying;
use Henrotaym\LaravelPackageVersioning\Facades\Abstracts\VersionablePackageFacade;

class Package extends VersionablePackageFacade
{
    public static function getPackageClass(): string
    {
        return Underlying::class;
    }
}