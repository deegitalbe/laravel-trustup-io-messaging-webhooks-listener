<?php
namespace Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Listeners\Guards;

use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\ListenerContract;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\Config\ListenToCorrespondingAppKey;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\Guards\AppKeyListenerGuardContract;

class AppKeyListenerGuard implements AppKeyListenerGuardContract
{
    /**
     * Telling if listener should be triggered.
     */
    public function shouldTrigger(ListenerContract $listener, ?string $appKey): bool
    {
        if (!$this->isListeningToCorrespondingAppKey($listener)) return true;

        return $this->isMatchingMessagingAppKey($appKey);
    }

    /**
     * Telling if given listener is listening to corresponding app key only.
     * 
     * @param ListenerContract $listener
     * @return bool
     */
    protected function isListeningToCorrespondingAppKey(ListenerContract $listener): bool
    {
        return $listener instanceof ListenToCorrespondingAppKey;
    }

    /**
     * Telling if given app key is matching current app key.
     * 
     * @param string $appKey
     * @return bool
     */
    protected function isMatchingMessagingAppKey(?string $appKey): bool
    {
        return env("TRUSTUP_MESSAGING_APP_KEY", "") === $appKey;
    }
}