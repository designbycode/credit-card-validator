<?php

namespace Designbycode\CreditCardValidator;

use Designbycode\LuhnAlgorithm\LuhnAlgorithm;

/**
 * Class CreditCardValidator
 *
 * Validates a credit card number
 */
class CreditCardValidator
{
    private const MIN_CARD_LENGTH = 13;

    private const MAX_CARD_LENGTH = 19;

    /**
     * @var string The credit card number
     */
    public string $cardNumber;

    /**
     * Constructor
     *
     * @param  string  $cardNumber  The credit card number
     */
    public function __construct(string $cardNumber)
    {
        $this->cardNumber = $cardNumber;
    }

    private function cleanString($cardNumber): string
    {
        return preg_replace('/[\s\/\\\\_\-]+/', '', $cardNumber);
    }

    private function normalizeCardNumber(): string
    {
        return preg_replace('/[\s\/\\\\_\-]+/', '', $this->cardNumber);
    }

    private function containsOnlyDigits(string $cardNumber): bool
    {
        return preg_match('/^[0-9]+$/', $cardNumber);
    }

    /**
     * Validates the credit card number
     *
     * @return bool True if the credit card number is valid, false otherwise
     */
    public function isValid(): bool
    {
        $normalizedCardNumber = $this->normalizeCardNumber();

        if (! $this->containsOnlyDigits($normalizedCardNumber)) {
            throw new \InvalidArgumentException('Card number must contain only digits');
        }

        $cardType = $this->getCardType();
        $cardLength = strlen($normalizedCardNumber);

        if ($cardType === CardEnum::AMERICAN_EXPRESS && $cardLength !== 15) {
            throw new \InvalidArgumentException('American Express card numbers must be 15 digits long');
        } elseif ($cardType === CardEnum::DINERS_CLUB && $cardLength !== 14) {
            throw new \InvalidArgumentException('Diners Club card numbers must be 14 digits long');
        } elseif ($cardType !== CardEnum::AMERICAN_EXPRESS && $cardType !== CardEnum::DINERS_CLUB && ($cardLength < self::MIN_CARD_LENGTH || $cardLength > self::MAX_CARD_LENGTH)) {
            throw new \InvalidArgumentException('Card number length is invalid');
        }

        return (new LuhnAlgorithm())->isValid($normalizedCardNumber);
    }

    /**
     * Gets the card type based on the card number
     */
    public function getCardType(): ?string
    {
        foreach (CardEnum::cases() as $cardType) {
            if (preg_match($cardType->regex(), $this->cleanString($this->cardNumber))) {
                return $cardType->slug();
            }
        }

        return null;
    }
}
