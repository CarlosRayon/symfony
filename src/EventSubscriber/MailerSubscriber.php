<?php

namespace App\EventSubscriber;

use App\Event\BudgetRequestEvent;
use App\Event\ProjectApprovedEvent;
use App\Service\EmailManagerService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MailerSubscriber implements EventSubscriberInterface
{

    private $emailManagerService;

    public function __construct(EmailManagerService $emailManagerService)
    {
        $this->$emailManagerService = $emailManagerService;
    }

    public static function getSubscribedEvents(): array
    {

        /* Example call event. */
        // ... Create Budget $budget with request data
        // $dispatcher	=	new	EventDispatcher();
        // $budget = new BudgetRequestEvent($budget);
        // $dispatcher->dispatch($budget,  BudgetRequestEvent::EVENT_NAME);

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

        $isSend = $this->emailManagerService->toCommercialsNoticeNewBudgetRequest($event->getBudget());
        //.... validate the return of function
    }

    public function onNoticeApprovedProject(ProjectApprovedEvent $event)
    {
        $isSend = $this->emailManagerService->toProjectManagerNoticeApprovedProject($event->getProject());
        $isSend = $this->emailManagerService->toCustomerNoticeApprovedProject($event->getProject());
        //.... validate the return of function
    }
}
