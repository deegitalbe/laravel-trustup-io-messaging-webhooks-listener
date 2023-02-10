<?php
namespace Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Http\Controllers\Webhooks\Messages;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\Messages\TrustupIoMessagingMessageCreatedListenerContract;

class MessageCreatedController extends Controller
{
    public function __invoke(
        Request $request,
        TrustupIoMessagingMessageCreatedListenerContract $listener
    ) {
        $listener->onMessageCreated($request->all());
    }
}