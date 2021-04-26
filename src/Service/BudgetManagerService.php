<?php

namespace App\Service;

class BudgetManagerService
{

    /**
     * Limp product data and Product Characteristics data and calculate a final price
     *
     * @param Budget $budget
     * @return float
     */
    public function calculateTotalPrice(): float
    {

        return 0.0;
    }

    /**
     * Modify status. But it only allows modifying those that are in pending state
     *
     * @param Budget $budget
     * @return boolean
     */
    public function setStatus(): bool
    {

        return true;
    }
}
