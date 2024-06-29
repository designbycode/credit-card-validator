# Credit card validator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/designbycode/credit-card-validator.svg?style=flat-square)](https://packagist.org/packages/designbycode/credit-card-validator)
[![Tests](https://img.shields.io/github/actions/workflow/status/designbycode/credit-card-validator/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/designbycode/credit-card-validator/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/designbycode/credit-card-validator.svg?style=flat-square)](https://packagist.org/packages/designbycode/credit-card-validator)

## Introduction
The Credit Card Validator package provides a set of classes to validate credit card numbers, expiry dates, and CVV codes. This package is designed to help you ensure that the credit card information provided by users is valid and accurate.

## Installation

You can install the package via composer:

```bash
composer require designbycode/credit-card-validator
```

## Usage
### CreditCardValidator
The `CreditCardValidator` class validates a credit card number.
#### Constructor
`__construct(string $cardNumber)`

`$cardNumber`: The credit card number to validate.
#### Methods
- `isValid()`: bool: Returns true if the credit card number is valid, false otherwise.
- `getCardType()`: ?string: Returns the card type (amex, diners, visa, mastercard, discover, or null if unknown).

```php
$card = new CreditCardValidator('4111 1111 1111 1111');
if ($card->isValid()) {
    echo 'Credit card number is valid';
} else {
    echo 'Credit card number is invalid';
}
```
### ExpiryDateValidator
The `ExpiryDateValidator` class validates the expiry date of a credit card.
#### Constructor
`__construct(int $expiryMonth, int $expiryYear)`

- $expiryMonth: The expiry month (1-12).
- $expiryYear: The expiry year (YYYY).

#### Methods

- `isValid()`: bool: Returns true if the expiry date is valid, false otherwise.

```php
$validator = new ExpiryDateValidator(12, 2025);
if ($validator->isValid()) {
    echo 'Expiry date is valid';
} else {
    echo 'Expiry date is invalid';
}
```

### CvvValidator
The `CvvValidator` class validates a CVV (Card Verification Value) code.

#### Constructor

`__construct(string $cvv, string $cardType)`

- $cvv: The CVV code to validate.
- $cardType: The card type (amex, visa, mastercard, etc.).


#### Methods

- `isValid()`: bool: Returns true if the CVV code is valid, false otherwise.

```php
$validator = new CvvValidator('123', 'visa');
or 
$card = new CreditCardValidator('4111 1111 1111 1111')
$validator = new CvvValidator('123', $card->getCardType());

if ($validator->isValid()) {
    echo 'CVV code is valid';
} else {
    echo 'CVV code is invalid';
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Claude Myburgh](https://github.com/claudemyburgh)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
