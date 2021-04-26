<?php

namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;

class ProjectApprovedEvent
{

    const EVENT_NAME = 'notice.approved.project';

    private $project;

    /**
     * Constructor
     *
     * @param Project $project
     */
    public function __construct($project) // Project $project
    {
        $this->project = $project;
    }

    /**
     * get Project
     *
     * @return Project
     */
    public function getProject()
    {

        return $this->project;
    }
}
