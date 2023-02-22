<?php
namespace Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Http\Controllers\Webhooks\Messages;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\Guards\AppKeyListenerGuardContract;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\Messages\TrustupIoMessagingMessageCreatedListenerContract;

class MessageCreatedController extends Controller
{
    public function __invoke(
        Request $request,
        TrustupIoMessagingMessageCreatedListenerContract $listener,
        AppKeyListenerGuardContract $guard
    ) {
        $shouldTrigger = $guard->shouldTrigger($listener, $request->input('conversation.app_name'));
        
        if (!$shouldTrigger) return;

        $listener->onMessageCreated($request->all());
    }
}