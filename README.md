# laravel-trustup-io-messaging-webhooks-listeners

## Prerequisite
This package uses ``deegitalbe/server-authorization`` package to authenticate requests. Refer to its [documentation](https://github.com/deegitalbe/server-authorization) to make sure it's correctly configured on your project.

## Installation
```shell
composer require deegitalbe/laravel-trustup-io-messaging-webhooks-listeners
```

## Publish configuration
```shell
php artisan vendor:publish --provider="Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Providers\LaravelTrustupIoMessagingWebhooksListenersServiceProvider" --tag="config"
```

## Available listeners

### Message created
Define your listener
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
Register your listener in config
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

## Listener configuration
Add any of those interfaces to your listener to customize it.

### Limit to your current app only
```php
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\Config\ListenToCorrespondingAppKey;
```