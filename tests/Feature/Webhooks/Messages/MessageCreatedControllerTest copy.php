<?php

use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\Messages\TrustupIoMessagingMessageCreatedListenerContract;

class MessageCreatedListener implements TrustupIoMessagingMessageCreatedListenerContract
{
    public function onMessageCreated(array $messageAttributes): void
    {
        // your implementation goes here ...
    }
}