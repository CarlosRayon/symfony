<?php

namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;
use Entity\Budget;

class BudgetRequestEvent extends Event
{

    const EVENT_NAME  =  'notice.new.budget.request';

    protected $budget;

    /**
     * Constructor
     *
     * @param Budget $budget
     */
    public function __construct($budget) // Budget $budget
    {
        $this->budget = $budget;
    }


    /**
     * get Budget
     *
     * @return Budget
     */
    public function getBudget()
    {

        return $this->budget;
    }
}
