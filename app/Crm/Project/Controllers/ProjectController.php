<?php

namespace Crm\Project\Controllers;

use App\Http\Controllers\Controller;
use Crm\Customer\Services\CustomerService;
use Crm\Project\Requests\CreateProjectRequest;
use Crm\Project\Services\ProjectService;
use Symfony\Component\HttpFoundation\Response;

//use  Crm\Project\Services\ProjectService;

class ProjectController extends Controller
{
    private ProjectService $projectService;
    private CustomerService $customerService;
    public function __construct(ProjectService $projectService,CustomerService $customerService){
        $this->projectService=$projectService;;
        $this->customerService=$customerService;;
    }

    public function createproject(createProjectRequest $request,$customer_id)
    {
        $customer=$this->customerService->show($customer_id);
        if(!$customer){
            return  response()->json(["message"=>"customer_id not found"],Response::HTTP_BAD_REQUEST);
        }

        return $this->projectService->create($request,$customer_id);
    }
}
