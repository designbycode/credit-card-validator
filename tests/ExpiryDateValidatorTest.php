<?php

use Designbycode\CreditCardValidator\ExpiryDateValidator;

beforeEach(function () {
    $this->validator = new ExpiryDateValidator(12, 2025);
});

it('validates a valid expiry date', function () {
    expect($this->validator->isValid())->toBeTrue();
});

it('invalidates an expiry date in the past', function () {
    $this->validator = new ExpiryDateValidator(12, 2020);
    expect($this->validator->isValid())->toBeFalse();
});

it('invalidates an expiry month outside the valid range', function () {
    $this->validator = new ExpiryDateValidator(13, 2025);
    expect($this->validator->isValid())->toBeFalse();
});
