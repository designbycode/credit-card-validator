<?php

namespace Designbycode\CreditCardValidator;

/**
 * Class CvvValidator
 *
 * Validates a CVV (Card Verification Value) code
 */
class CvvValidator
{
    /**
     * @var string The CVV code
     */
    private string $cvv;

    /**
     * @var string The card type (amex, visa, mastercard, etc.)
     */
    private string $cardType;

    /**
     * Constructor
     *
     * @param  string  $cvv  The CVV code
     * @param  string  $cardType  The card type
     */
    public function __construct($cvv, $cardType)
    {
        $this->cvv = $cvv;
        $this->cardType = $cardType;
    }

    /**
     * Validates the CVV code
     *
     * @return bool True if the CVV code is valid, false otherwise
     */
    public function isValid(): bool
    {
        $cvv = $this->cvv;

        // Check if the CVV code contains only digits
        if (! preg_match('/^[0-9]+$/', $cvv)) {
            return false;
        }

        $cvvLength = strlen($cvv);

        // Check the CVV length based on the card type
        if ($this->cardType === 'amex' && $cvvLength !== 4) {
            return false;
        } elseif ($this->cardType !== 'amex' && $cvvLength !== 3) {
            return false;
        }

        // If all checks pass, the CVV code is valid
        return true;
    }
}
