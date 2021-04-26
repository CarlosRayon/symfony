<?php

namespace App\Service;

use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class EmailManagerService
{

    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Send mail to customer with url access to backend and the budget
     *
     * @param Budget $budget
     * @return boolean
     */
    public function toCustomerAccessBackend(): bool
    {

        return true;
    }

    /**
     * Notice to the client that the budget request has been approved so the project has been created and information about the project is already sent
     *
     * @param Project $project
     * @return boolean
     */
    public function toCustomerNoticeApprovedProject(): bool
    {

        return true;
    }

    /**
     * Notice to the client that the status of their project created when approving their request has been changed
     *
     * @param Project $project
     * @return boolean
     */
    public function toCustomerNoticeProjectStatusChange(): bool
    {

        return true;
    }

    /**
     * Email advising the sales representatives that a new budget request has been received
     *
     * @param Budget $budget
     * @return boolean
     */
    public function toCommercialsNoticeNewBudgetRequest(): bool
    {

        return true;
    }

    /**
     * Notice to the project managers of a new approved request so a new project has been created and we send information about the project
     *
     * @param Project $project
     * @return boolean
     */
    public function toProjectManagerNoticeApprovedProject(): bool
    {

        return true;
    }

    /**
     * Notify the project manager that the technician has marked a task as completed
     *
     * @param ProjectTask $projectTask
     * @return boolean
     */
    public function toProjectManagerNoticeEndTask(): bool
    {

        return true;
    }

    /**
     * Notice to technicians that the status of a project in which they have associated tasks has been changed
     *
     * @param Project $project
     * @return boolean
     */
    public function toTechniciansNoticeProjectStatusChange(): bool
    {

        return true;
    }

    /**
     * Notify the technician that he has a new associated task
     *
     * @param ProjectTask $projectTask
     * @return boolean
     */
    public function toTechnicianNoticeAssignNewTask(): bool
    {

        return true;
    }
}
