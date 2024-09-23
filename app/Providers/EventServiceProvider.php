<?php

namespace App\Providers;

use Crm\User\Events\UserCreation;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Crm\Project\Events\ProjectCreation;
use Crm\Customer\Events\CustomerCreation;
use Crm\Customer\Listeners\SendWelcomeEmail;
use Crm\Project\Listeners\ProjectCreationProcess;
use Crm\User\Listeners\SendUserCreationNotificationn;
use App\Crm\Project\Listeners\SendProjectCreationEmail;
use Crm\Customer\Listeners\NotifySalesCustomerCreation;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class =>
        [
            SendEmailVerificationNotification::class,
        ],
        CustomerCreation::class =>
        [
            NotifySalesCustomerCreation::class,
            SendWelcomeEmail::class
        ],
        ProjectCreation::class=>
        [
            ProjectCreationProcess::class,
            SendProjectCreationEmail::class
        ],
        UserCreation::class =>
        [ 
            SendUserCreationNotificationn::class 
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
