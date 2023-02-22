<?php
namespace Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\Guards;

use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\ListenerContract;

interface AppKeyListenerGuardContract
{
    /**
     * Telling if listener is triggerable.
     * 
     * @param ListenerContract $listener
     * @return bool
     */
    public function shouldTrigger(ListenerContract $listener, ?string $appKey): bool;
}