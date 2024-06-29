<?php

use Designbycode\CreditCardValidator\CreditCardValidator;

beforeEach(function () {
    //        $this->card = new CreditCardValidator('4111111111111111');
});

it('validates a valid mastercard credit card number', function () {
    expect((new CreditCardValidator('4111111111111111'))->isValid())->toBeTrue();
});

it('validates a valid mastercard credit card number funds availability next business day', function () {
    expect((new CreditCardValidator('5000333641352301'))->isValid())->toBeTrue();
});

it('validates a valid mastercard credit card number funds availability two to five business days', function () {
    expect((new CreditCardValidator('5000361001156749'))->isValid())->toBeTrue();
});

it('validates a valid mastercard credit card number for Bangladesh', function ($card) {
    expect((new CreditCardValidator($card))->isValid())->toBeTrue();
})->with([
    '5555500830030331',
    '5662760010000013',
]);

it('validates a valid mastercard credit card number for Cambodia', function ($card) {
    expect((new CreditCardValidator($card))->isValid())->toBeTrue();
})->with([
    '5801161600000095',
    '5801161600000103',
    '5801161600000111',
    '5801161681210563',
]);

it('validates a valid mastercard credit card number for Dominican', function ($card) {
    expect((new CreditCardValidator($card))->isValid())->toBeTrue();
})->with([
    '5204460010000007',
    '5204460010000015',
    '5204460010000023',
    '5204460010000031',
    '5204460010000049',
    '5204460010000056',
]);

it('validates a valid mastercard credit card number for Haiti', function ($card) {
    expect((new CreditCardValidator($card))->isValid())->toBeTrue();
})->with([
    '5433070000000009',
    '5433070000000017',
    '5433070000000025',
    '5433070000000033',
    '5433070000000041',
    '5433070000000058',
]);

it('validates a valid mastercard credit card number for Hong Kong', function ($card) {
    expect((new CreditCardValidator($card))->isValid())->toBeTrue();
})->with([
    '5982761200000006',
    '5982761200000014',
    '5982761200000022',
    '5982761253008740',
]);

it('validates a valid mastercard credit card number for India', function ($card) {
    expect((new CreditCardValidator($card))->isValid())->toBeTrue();
})->with([
    '5299920000000149',
    '5299920210000277',
]);

it('validates a valid mastercard credit card number for Indonesia', function ($card) {
    expect((new CreditCardValidator($card))->isValid())->toBeTrue();
})->with([
    '5204860290000405',
    '5204860290001122',
]);

it('validates a valid mastercard credit card number for Jamaica', function ($card) {
    expect((new CreditCardValidator($card))->isValid())->toBeTrue();
})->with([
    '5204480010000005',
    '5204480010000013',
    '5204480010000021',
    '5204480010000039',
    '5204480010000047',
    '5204480010000179',
]);

it('validates a valid mastercard credit card number for Kazakhstan', function ($card) {
    expect((new CreditCardValidator($card))->isValid())->toBeTrue();
})->with([
    '5299930010000005',
    '5299930010000013',
    '5299930010000021',
    '5299930010000039',
    '5299930010000047',
    '5299930010000054',
]);

it('validates a valid mastercard credit card number for Malaysia', function ($card) {
    expect((new CreditCardValidator($card))->isValid())->toBeTrue();
})->with([
    '5204860290000090',
    '5204860290000207',
    '5204860010000487',
    '5204860010000362',
    '5204860010000826',
    '5204860010001261',
    '5204860010001287',
]);

it('validates a valid mastercard credit card number for Peru', function ($card) {
    expect((new CreditCardValidator($card))->isValid())->toBeTrue();
})->with([
    '5204580000000004',
    '5204580000000012',
    '5204580000000020',
    '5204580000000038',
    '5204580000000046',
    '5204580000000053',
    '5204580000001267',
    '5204580000001275',
]);

it('validates a valid mastercard credit card number for Philippines', function ($card) {
    expect((new CreditCardValidator($card))->isValid())->toBeTrue();
})->with([
    '5204930010000090',
    '5204930010000181',
    '5204930360000674',
    '5204930360000716',
    '5204930360000823',
    '5204930360001029',
]);

it('validates a valid mastercard credit card number for Russia', function ($card) {
    expect((new CreditCardValidator($card))->isValid())->toBeTrue();
})->with([
    '5185730450000003',
    '5185730450000011',
    '5185730450000029',
    '5185730450000037',
    '5185730450000045',
    '5185730450000052',
    '5185730550000002',
    '5185730550000010',
]);

it('validates a valid mastercard credit card number for Sri Lanka', function ($card) {
    expect((new CreditCardValidator($card))->isValid())->toBeTrue();
})->with([
    '5033972029756004',
]);

it('validates a valid mastercard credit card number for Thailand', function ($card) {
    expect((new CreditCardValidator($card))->isValid())->toBeTrue();
})->with([
    '5204890310000887',
    '5204890310000911',
    '5204890320000117',
    '5204890320000141',
    '5204890320000166',
    '5204890320000190',
    '5204890320000216',
    '5204890320000232',
]);

it('validates a valid mastercard credit card number for Uganda', function ($card) {
    expect((new CreditCardValidator($card))->isValid())->toBeTrue();
})->with([
    '5328930010000034',
    '5328930010005009',
    '5328930010502658',
]);

it('validates a valid mastercard credit card number for Vietnam', function ($card) {
    expect((new CreditCardValidator($card))->isValid())->toBeTrue();
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

it('returns the correct card type', function () {
    expect((new CreditCardValidator('4111111111111111'))->getCardType())->toBe('visa');
});

it('invalidates an invalid mastercard credit card number', function () {
    $this->card = new CreditCardValidator('4111 1111 1111 1112');
    expect($this->card->isValid())->toBeFalse();
});

it('throws an InvalidArgumentException when the card number contains non-digit characters', function () {
    $validator = new CreditCardValidator('546307023000033a');
    expect(fn () => $validator->isValid())->toThrow(InvalidArgumentException::class);
});

it('validates a credit card number with underscores characters', function () {
    $this->card = new CreditCardValidator('4111_1111_1111_1111');
    expect($this->card->isValid())->toBeTrue();
});

it('validates a credit card number with dashes characters', function () {
    $this->card = new CreditCardValidator('4111-1111-1111-1111');
    expect($this->card->isValid())->toBeTrue();
});

it('validates a credit card number with forward-dashes characters', function () {
    $this->card = new CreditCardValidator('4111/1111/1111/1111');
    expect($this->card->isValid())->toBeTrue();
});

it('validates a credit card number with back-dashes characters', function () {
    $this->card = new CreditCardValidator('4111\1111\1111\1111');
    expect($this->card->isValid())->toBeTrue();
});

it('validates a card type is American Express', function () {
    $this->card = new CreditCardValidator('378282246310005');
    expect($this->card->getCardType())->toEqual('amex');
});
