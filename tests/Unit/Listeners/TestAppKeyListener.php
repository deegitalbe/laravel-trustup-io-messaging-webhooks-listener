<?php
namespace Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Tests\Unit\Listeners;

use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\Config\ListenToCorrespondingAppKey;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\Messages\TrustupIoMessagingMessageCreatedListenerContract;

class TestAppKeyListener implements TrustupIoMessagingMessageCreatedListenerContract, ListenToCorrespondingAppKey {
    public function onMessageCreated(array $webhookData): void
    {
        
    }
};