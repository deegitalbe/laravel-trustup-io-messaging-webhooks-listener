<?php
namespace Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\Messages;

/**
 * Representing a message created listener.
 */
interface TrustupIoMessagingMessageCreatedListenerContract
{
    /**
     * Performing action based on new message attributes.
     * 
     * @param array $messageAttributes
     * @return void
     */
    public function onMessageCreated(array $messageAttributes): void;
}