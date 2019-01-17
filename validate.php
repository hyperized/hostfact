<?php declare(strict_types=1);

use Doctrine\Common\Annotations\AnnotationRegistry;
use Hyperized\Hostfact\Controllers\Parameters\CreditorShow;
use Symfony\Component\Validator\Validation;

require __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

/** @noinspection PhpDeprecationInspection */
AnnotationRegistry::registerLoader('class_exists');

$validator = Validation::createValidatorBuilder()
    ->enableAnnotationMapping()
    ->getValidator();


$request = (new CreditorShow(['CreditorCode' => 'CD0001'], $validator))->toArray();

print_r($request);
