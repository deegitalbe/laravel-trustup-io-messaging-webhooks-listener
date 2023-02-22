<?php
namespace Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Tests\Feature;

use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\Messages\TrustupIoMessagingMessageCreatedListenerContract;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Tests\TestCase;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Tests\Unit\Listeners\TestAppKeyListener;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Tests\Unit\Listeners\TestListener;
use Deegitalbe\ServerAuthorization\Http\Middleware\AuthorizedServer;

class MessageCreatedControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(AuthorizedServer::class);
        $this->withoutExceptionHandling();
    }

    public function test_that_triggering_message_created_listener_with_correct_attributes()
    {
        $listener = $this->mockThis(TrustupIoMessagingMessageCreatedListenerContract::class);
        $messageAttributes = ['hello' => 'world'];

        $listener->shouldReceive('onMessageCreated')->once()->with($messageAttributes);
        
        $response = $this->json(
            "POST",
            route(
                'webhooks.trustup-io-messaging.messages.created',
                ['message' => 'uuid']
            ),
            $messageAttributes
        );

        $response->assertStatus(200);
    }

    public function test_that_triggering_app_key_message_created_listener_with_correct_attributes()
    {
        putenv("TRUSTUP_MESSAGING_APP_KEY=test");
        $this->app->bind(TrustupIoMessagingMessageCreatedListenerContract::class, TestAppKeyListener::class);
        $listener = $this->mockThis(TestAppKeyListener::class);
        $messageAttributes = ['hello' => 'world', 'conversation' => ['app_name' => 'test']];

        $listener->shouldReceive('onMessageCreated')->once()->with($messageAttributes);
        
        $response = $this->json(
            "POST",
            route(
                'webhooks.trustup-io-messaging.messages.created',
                ['message' => 'uuid']
            ),
            $messageAttributes
        );

        $response->assertStatus(200);
    }

    public function test_that_not_triggering_different_app_key_message_created_listener()
    {
        putenv("TRUSTUP_MESSAGING_APP_KEY=nope");
        $listener = $this->mockThis(TestAppKeyListener::class);
        $this->app->bind(TrustupIoMessagingMessageCreatedListenerContract::class, TestAppKeyListener::class);
        $messageAttributes = ['hello' => 'world', 'conversation' => ['app_name' => 'test']];

        $listener->shouldNotReceive('onMessageCreated');
        
        $response = $this->json(
            "POST",
            route(
                'webhooks.trustup-io-messaging.messages.created',
                ['message' => 'uuid']
            ),
            $messageAttributes
        );

        $response->assertStatus(200);
    }
}