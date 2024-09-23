<?php

namespace App\Crm\Project\Listeners;

use Crm\Customer\Services\CustomerService;
use Crm\Project\Events\ProjectCreation;

class SendProjectCreationEmail
{
    /**
     * Create the event listener.
     */
    private  CustomerService $customerService;
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Handle the event.
     */
    public function handle(ProjectCreation $event): void
    {
        $project=$event->getProject();
        $customer=$this->customerService->show( $project->customer_id);
    }
}
