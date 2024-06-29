<?php

require_once './vendor/autoload.php';
use Designbycode\CreditCardValidator\CreditCardValidator;

$card = new CreditCardValidator('4111111111111111');
var_dump($card->isValid());
