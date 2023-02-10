# laravel-trustup-io-messaging-webhooks-listeners

## Installation
```shell
composer require deegitalbe/laravel-trustup-io-messaging-webhooks-listeners
```

## Publish configuration
```shell
php artisan vendor:publish --provider="Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Providers\LaravelTrustupIoMessagingWebhooksListenersServiceProvider" --tag="config"
```

## Available listeners
See in config what you would like to listen to and created dedicated class implementing required contract.

### Messages listeners

#### Message created listener

##### Define listener
```php
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\Messages\TrustupIoMessagingMessageCreatedListenerContract;

class MessageCreatedListener implements TrustupIoMessagingMessageCreatedListenerContract
{
    public function onMessageCreated(array $messageAttributes): void
    {
        // your implementation goes here ...
    }
}
```

##### Register your listener
```php
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
```