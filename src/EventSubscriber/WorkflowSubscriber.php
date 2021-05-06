<?php

namespace App\EventSubscriber;

use App\Service\EmailManagerService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Workflow\Event\Event;

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
}
