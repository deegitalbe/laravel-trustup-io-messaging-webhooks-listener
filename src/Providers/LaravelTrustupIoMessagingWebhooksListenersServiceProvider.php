<?php
namespace Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Providers;

use Illuminate\Support\Facades\Route;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Package;
use Deegitalbe\ServerAuthorization\Http\Middleware\AuthorizedServer;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Facades\Package as PackageFacade;
use Henrotaym\LaravelPackageVersioning\Providers\Abstracts\VersionablePackageServiceProvider;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Listeners\Guards\AppKeyListenerGuard;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\Guards\AppKeyListenerGuardContract;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\Messages\TrustupIoMessagingMessageCreatedListenerContract;

class LaravelTrustupIoMessagingWebhooksListenersServiceProvider extends VersionablePackageServiceProvider
{
    public static function getPackageClass(): string
    {
        return Package::class;
    }

    protected function addToRegister(): void
    {
        $this->registerMessageCreatedListener()
            ->registerAppKeyGuard();
    }

    protected function addToBoot(): void
    {
        $this->loadWebhooksRoutes();
    }

    protected function registerMessageCreatedListener(): self
    {
        $this->app->bind(
            TrustupIoMessagingMessageCreatedListenerContract::class,
            PackageFacade::getConfig('listeners.messages.created')
        );

        return $this;
    }

    protected function registerAppKeyGuard(): self
    {
        $this->app->bind(AppKeyListenerGuardContract::class, AppKeyListenerGuard::class);

        return $this;
    }

    protected function loadWebhooksRoutes(): self
    {
        Route::prefix('webhooks/trustup-io-messaging')
            ->middleware(AuthorizedServer::class)
            ->name('webhooks.trustup-io-messaging.')
            ->group(function () {
                $this->loadRoutesFrom(__DIR__ . "/../routes/webhooks.php");
            });

        return $this;
    }
}