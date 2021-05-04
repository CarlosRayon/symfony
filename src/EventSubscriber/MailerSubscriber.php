<?php

namespace App\EventSubscriber;

use App\Event\BudgetRequestEvent;
use App\Event\ProjectApprovedEvent;
use App\Service\EmailManagerService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MailerSubscriber implements EventSubscriberInterface
{

    // private $emailManagerService;

    // public function __construct(EmailManagerService $emailManagerService)
    // {
    //     $this->$emailManagerService = $emailManagerService;
    // }

    public static function getSubscribedEvents(): array
    {

        return [
            BudgetRequestEvent::EVENT_NAME => 'onNoticeNewBudgetRequest',
            ProjectApprovedEvent::EVENT_NAME => 'onNoticeApprovedProject'
        ];
    }

    /**
     * When a budget is requested
     *
     * @param BudgetRequestEvent $event
     * @return void
     */
    public function onNoticeNewBudgetRequest(BudgetRequestEvent $event)
    {

        // $isSend = $this->emailManagerService->toCustomerAccessBackend($event->getBudget());
        // $this->emailManagerService->toCustomerAccessBackend();

    }

    public function onNoticeApprovedProject(ProjectApprovedEvent $event)
    {
        $this->emailManagerService->toProjectManagerNoticeApprovedProject($event->getProject());
        $this->emailManagerService->toCustomerNoticeApprovedProject($event->getProject());
    }
}
