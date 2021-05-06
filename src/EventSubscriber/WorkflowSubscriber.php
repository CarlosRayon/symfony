<?php

namespace App\EventSubscriber;

use App\Service\EmailManagerService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Workflow\Event\Event;
use Symfony\Component\Workflow\Event\GuardEvent;


class WorkflowSubscriber implements EventSubscriberInterface
{
    private $emailManagerService;

    public function __construct(EmailManagerService $emailManagerService)
    {
        $this->emailManagerService = $emailManagerService;
    }

    public static function getSubscribedEvents()
    {
        return [
            'workflow.project.completed' => 'onProjectStatusChange',
            'workflow.project_task.completed' => 'onProjectTaskFinished',
            'workflow.project.guard.to_finished' => 'guardFinished'
        ];
    }

    public function onProjectStatusChange(Event $event)
    {
        $project = $event->getSubject();
        $this->emailManagerService->toCustomerNoticeProjectStatusChange($project);
        $this->emailManagerService->toTechniciansNoticeProjectStatusChange($project);
    }

    public function onProjectTaskFinished(Event $event)
    {
        if ($event->getTransition()->getName() == "to_finished") {
            $projectTask = $event->getSubject();
            $this->emailManagerService->toProjectManagerNoticeEndTask($projectTask);
        }
    }

    public function guardFinished(GuardEvent $event)
    {
        $project = $event->getSubject();

        foreach ($project->getProjectTask() as $projectTask) {
            if (!in_array('finished', $projectTask->getPlaces())) {
                $event->setBlocked(true);
            }
        }
    }
}
