<?php

namespace Designbycode\CreditCardValidator;

enum CardEnum
{
    case VISA;

    case MASTERCARD;

    case AMERICAN_EXPRESS;

    case DINERS_CLUB;

    case DISCOVER;

    public function regex(): string
    {
        return match ($this) {
            self::VISA => '/^4[0-9]{12}([0-9]{3})?$/',
            self::MASTERCARD => '/^(5[1-5][0-9]{2}|222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12}$/',
            self::AMERICAN_EXPRESS => '/^3[47][0-9]{13}$/',
            self::DINERS_CLUB => '/^3(?:0[0-5]|[68][0-9])[0-9]{11}$/',
            self::DISCOVER => '/^6(?:011|5[0-9][0-9])[0-9]{12}$/',
        };
    }

    public function name(): string
    {
        return match ($this) {
            self::VISA => 'Visa',
            self::MASTERCARD => 'Mastercard',
            self::AMERICAN_EXPRESS => 'American Express',
            self::DINERS_CLUB => 'Diners Club',
            self::DISCOVER => 'Discover',
        };
    }

    public function slug(): string
    {
        return match ($this) {
            self::VISA => 'visa',
            self::MASTERCARD => 'mastercard',
            self::AMERICAN_EXPRESS => 'amex',
            self::DINERS_CLUB => 'diners-club',
            self::DISCOVER => 'discover',
        };
    }
}
