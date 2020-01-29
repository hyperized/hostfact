<?php declare(strict_types=1);

use Hyperized\Hostfact\Api\Models\Creditor;

require __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';


$creditor = new Creditor();
$creditor->creditorCode = 'yello';
$creditor->identifier = 1;


var_dump($creditor);