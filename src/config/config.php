<?php
return [
    /**
     * Messaging microservice listeners.
     */
    "listeners" => [
        /**
         * Message related listeners.
         */
        "messages" =>  [
            /**
             *  Message created listener.
             * 
             * @implements \Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\Messages\TrustupIoMessagingMessageCreatedListenerContract
             */
            "created" => MessageCreatedListener::class
        ]
    ]
];