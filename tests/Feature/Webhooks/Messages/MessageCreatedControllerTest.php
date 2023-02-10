<?php
namespace Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Tests\Feature;

use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\Messages\TrustupIoMessagingMessageCreatedListenerContract;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Tests\TestCase;
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
}