<?php

namespace App\Service;

use phpDocumentor\Reflection\Project;

class ProjectManagerService
{

    /**
     * Create a new project based on budget
     *
     * @param Budget $budget
     * @return Project
     */
    public function createProject()
    {
    }

    /**
     * Modify the status. In order to change finished states I cannot have tasks that are not finished.
     *@param Project $project
     * @return boolean
     */
    public function setStatus(): bool
    {
        return true;
    }

    /**
     * Calculate the degree of progress of the project so that the client can see it.
     * @param Project $project
     * @return float
     */
    public function getAdvance(): float
    {
        /* It will be calculated as the percentage of completed tasks with respect to the total number of project tasks (total task * (completed task / 100)*/

        return 0.0;
    }
}
