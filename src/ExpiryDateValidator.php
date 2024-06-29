<?php

namespace Designbycode\CreditCardValidator;

/**
 * Class ExpiryDateValidator
 *
 * Validates the expiry date of a credit card
 */
class ExpiryDateValidator
{
    /**
     * @var int The expiry month (1-12)
     */
    private int $expiryMonth;

    /**
     * @var int The expiry year (YYYY)
     */
    private int $expiryYear;

    /**
     * Constructor
     *
     * @param  int  $expiryMonth  The expiry month (1-12)
     * @param  int  $expiryYear  The expiry year (YYYY)
     */
    public function __construct(int $expiryMonth, int $expiryYear)
    {
        $this->expiryMonth = $expiryMonth;
        $this->expiryYear = $expiryYear;
    }

    /**
     * Validates the expiry date
     *
     * @return bool True if the expiry date is valid, false otherwise
     */
    public function isValid(): bool
    {
        // Check if the expiry month is within the valid range (1-12)
        if ($this->expiryMonth < 1 || $this->expiryMonth > 12) {
            return false;
        }

        // Get the current year and month
        $currentYear = date('Y');
        $currentMonth = date('n');

        // Check if the expiry year is in the past
        if ($this->expiryYear < $currentYear) {
            return false;
        }
        // Check if the expiry year is the current year and the expiry month is in the past
        elseif ($this->expiryYear == $currentYear && $this->expiryMonth < $currentMonth) {
            return false;
        }

        // If all checks pass, the expiry date is valid
        return true;
    }
}
