<?php

use Designbycode\CreditCardValidator\CvvValidator;

beforeEach(function () {
    $this->validator = new CvvValidator('123', 'visa');
});

it('validates a valid CVV code', function () {
    expect($this->validator->isValid())->toBeTrue();
});

it('invalidates an invalid CVV code', function () {
    $this->validator = new CvvValidator('123a', 'visa');
    expect($this->validator->isValid())->toBeFalse();
});

it('invalidates a CVV code with incorrect length', function () {
    $this->validator = new CvvValidator('1234', 'visa');
    expect($this->validator->isValid())->toBeFalse();
});

it('validates a CVV code with incorrect length bulk', function ($card) {
    $this->card = new \Designbycode\CreditCardValidator\CreditCardValidator($card);
    $this->validator = new CvvValidator('1234', $this->card->getCardType());
    expect($this->validator->isValid())->toBeFalse();
})->with([
    '5463070230000335',
    '5463070010000380',
    '5463070430000135',
    '5463070430001307',
    '5463070430001257',
    '5463070430001141',
    '5463070430000994',
    '5463070430000861',
]);
