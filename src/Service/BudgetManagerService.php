<?php

namespace App\Service;

use App\Entity\Budget;

class BudgetManagerService
{

    /**
     * Limp product data and Product Characteristics data and calculate a final price
     *
     * @param Budget $budget
     * @return float
     */
    public function calculateTotalPrice(Budget $budget): float
    {

        $totalPrice = $budget->getProduct()->getPrice();

        foreach ($budget->getProductCharacteristics() as $characteristics) {
           $totalPrice += $characteristics->getPrice();
        }
        return $totalPrice;
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
