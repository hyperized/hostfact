<?php /** @noinspection PhpPropertyNamingConventionInspection */ declare(strict_types=1);

namespace Hyperized\Hostfact\Controllers\Parameters;

use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class CreditorShow
 *
 * @package Hyperized\Hostfact\Endpoints\Parameters
 */
final class CreditorShow extends ParameterAbstract
{
    /**
     * @Assert\Type(
     *     type="integer"
     * )
     */
    protected $Identifier;
    /**
     * @Assert\Type(
     *     type="string",
     * )
     */
    protected $CreditorCode;
}
