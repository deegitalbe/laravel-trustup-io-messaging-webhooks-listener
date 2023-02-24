<?php
namespace Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Http\Controllers\Webhooks\Messages;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\Guards\AppKeyListenerGuardContract;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\Messages\TrustupIoMessagingMessageCreatedListenerContract;
use Illuminate\Support\Facades\Log;

class MessageCreatedController extends Controller
{
    public function __invoke(
        Request $request,
        TrustupIoMessagingMessageCreatedListenerContract $listener,
        AppKeyListenerGuardContract $guard
    ) {
        Log::error("this is before should trigger", [
            "request" => $request->all(),
            "app_name" => $request->input('conversation.app_name'),
            "listener" => $listener::class
        ]);

        $shouldTrigger = $guard->shouldTrigger($listener, $request->input('conversation.app_name'));

        Log::error("should trigger value", [
            "shouldTrigger" => $shouldTrigger
        ]);
        
        if (!$shouldTrigger) return;

        $listener->onMessageCreated($request->all());
    }
}