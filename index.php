<?php

require_once './vendor/autoload.php';
use Designbycode\CreditCardValidator\CreditCardValidator;

if (isset($_POST['card_number'])) {
    $card = new CreditCardValidator($_POST['card_number']);
    $isValid = $card->isValid();
    var_dump($isValid);
    echo "<script>document.getElementById('output').innerHTML = 'Card is ".($isValid ? 'valid' : 'invalid')."';</script>";
    exit;
}

?>

<!doctype html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Card Validator</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 text-white grid place-content-center h-full">
    <div class="max-w-2xl w-full bg-gray-800 rounded-lg p-6">
        <form method="post" action="index.php" class="w-full">
            <label class="mb-2 inline-block" for="card">Card Number</label>
            <div class="flex space-x-2 ">
                <input id="card" type="text" name="card_number" class="h-12 px-6 py-2 text-gray-800 rounded w-[500px]"> <button class="px-6 py-2 rounded bg-blue-500 hover:bg-blue-400">Test</button>
            </div>
        </form>

        <div id="output"></div>

    </div>
</body>
</html>
