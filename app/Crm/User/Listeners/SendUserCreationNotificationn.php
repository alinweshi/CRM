<?php

namespace Crm\User\Listeners;

use Crm\User\Events\UserCreation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendUserCreationNotificationn
{
    /**
     * Create the event listener.
     */
    public function __construct(private UserCreation $userCreation)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle($userCreation): void
    {
        // echo "welcom user ". $userCreation->getUser()->name;   
    }
}
