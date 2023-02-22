<?php
namespace Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\Messages;

use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\ListenerContract;

/**
 * Representing a message created listener.
 */
interface TrustupIoMessagingMessageCreatedListenerContract extends ListenerContract
{
    /**
     * Performing action based on new message attributes.
     * 
     * @param array $messageAttributes
     * @return void
     */
    public function onMessageCreated(array $messageAttributes): void;
}