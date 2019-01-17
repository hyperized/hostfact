<?php declare(strict_types=1);

require __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Hyperized\Hostfact\Controllers\Creditor;

$creditor = (new Creditor())->show([
    'CreditorCode'	=> 'CD0001',
]);

print_r($creditor);

$creditor2 = (new Creditor())->list([
    'order'	=> 'DESC',
]);

print_r($creditor2);


