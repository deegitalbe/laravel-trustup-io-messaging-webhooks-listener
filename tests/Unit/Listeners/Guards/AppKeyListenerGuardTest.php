<?php
namespace Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Tests\Unit\Listeners\Guards;

use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Tests\TestCase;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Tests\Unit\Listeners\TestListener;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Listeners\Guards\AppKeyListenerGuard;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\Guards\AppKeyListenerGuardContract;
use Deegitalbe\LaravelTrustupIoMessagingWebhooksListeners\Contracts\Listeners\ListenerContract;
use Mockery\MockInterface;

class AppKeyListenerGuardTest extends TestCase
{
    public function test_that_instanciating_app_key_listener_guard()
    {
        $this->assertInstanceOf(AppKeyListenerGuard::class, $this->app->make(AppKeyListenerGuardContract::class));
    }

    public function test_that_returning_true_if_listening_to_corresponding_app_key()
    {
        $guard = $this->newAppKeyGuard();
        $listener = $this->mockThis(TestListener::class);

        $this->assertTrue($this->callPrivateMethod("isListeningToCorrespondingAppKey", $guard, $listener));
    }
    
    public function test_that_returning_false_if_not_listening_to_corresponding_app_key()
    {
        $guard = $this->newAppKeyGuard();
        $listener = $this->mockThis(ListenerContract::class);

        $this->assertFalse($this->callPrivateMethod("isListeningToCorrespondingAppKey", $guard, $listener));
    }

    public function test_that_returning_false_if_not_matching_messaging_app_key()
    {
        $guard = $this->newAppKeyGuard();

        $this->assertFalse($this->callPrivateMethod("isMatchingMessagingAppKey", $guard, "test"));
    }

    public function test_that_returning_true_if_matching_messaging_app_key()
    {
        $guard = $this->newAppKeyGuard();
        putenv("TRUSTUP_MESSAGING_APP_KEY=test");

        $this->assertTrue($this->callPrivateMethod("isMatchingMessagingAppKey", $guard, "test"));
    }

    public function test_that_triggering_while_not_listening_to_app_key()
    {
        /** @var MockInterface|ListenerContract */
        $listener = $this->mockThis(ListenerContract::class);
        $appKey = "test";
        /** @var MockInterface|AppKeyListenerGuard */
        $guard = $this->mockThis(AppKeyListenerGuard::class);

        $guard->shouldReceive("shouldTrigger")->once()->with($listener, $appKey)->passthru();
        $guard->shouldReceive("isListeningToCorrespondingAppKey")->once()->with($listener)->andReturn(false);
        
        $this->assertTrue($guard->shouldTrigger($listener, $appKey));
    }

    public function test_that_triggering_while_listening_to_app_key()
    {
        /** @var MockInterface|ListenerContract */
        $listener = $this->mockThis(ListenerContract::class);
        $appKey = "test";
        /** @var MockInterface|AppKeyListenerGuard */
        $guard = $this->mockThis(AppKeyListenerGuard::class);

        $guard->shouldReceive("shouldTrigger")->once()->with($listener, $appKey)->passthru();
        $guard->shouldReceive("isListeningToCorrespondingAppKey")->once()->with($listener)->andReturn(true);
        $guard->shouldReceive("isMatchingMessagingAppKey")->once()->with("test")->andReturn(true);
        
        $this->assertTrue($guard->shouldTrigger($listener, $appKey));
    }

    protected function newAppKeyGuard(): AppKeyListenerGuard
    {
        return $this->app->make(AppKeyListenerGuard::class);
    }
}