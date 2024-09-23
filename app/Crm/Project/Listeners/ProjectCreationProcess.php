<?php

namespace Crm\Project\Listeners;

use Crm\Customer\Services\CustomerService;
use Crm\Project\Events\ProjectCreation;

class ProjectCreationProcess
{
     
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     */
    public function handle(ProjectCreation $event): void
    {
        echo "welcome " . $event->getProject()->name;
    }
}
