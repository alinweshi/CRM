<?php

namespace Crm\Project\Events;

use Crm\Project\Models\Project;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use ReflectionProperty;

class ProjectCreation
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private Project $project;
    /**
     * Create a new event instance.
     */
    public function __construct(Project $project)
    {
        $this->setProject($project);
    }

    /**
     * @return Project
     */
    public function getProject(): Project
    {
        return $this->project;
    }
    protected function setProject($project)
    {
        return $this->project=$project;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return
        [
            new PrivateChannel('channel-name'),
        ];
    }
}
