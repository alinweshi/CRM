<?php
Namespace Crm\Project\Services;
use Crm\Project\Events\ProjectCreation;
use Crm\Project\Models\Project;
use Crm\Project\Requests\CreateProjectRequest;

class ProjectService {

    public function index()
    {
      return Project::all();
    }
    public function show()
    {
    }
    public function create(CreateProjectRequest $request,$customer_id)
    {

        $project=Project::create
        (
            [
                "name"=>$request->name,
                 "status" =>(bool) $request->status,
                "customer_id"=>$customer_id,
                "Project_cost" => $request->Project_cost,
            ]
        );
        event(new ProjectCreation($project));
    }
    public function update()
    {
    }
    public function delete()
    {
    }

}
