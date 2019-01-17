<?php /** @noinspection PhpPropertyNamingConventionInspection */ declare(strict_types=1);

namespace Hyperized\Hostfact\Controllers\Parameters;

use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class CreditorAdd
 *
 * @package Hyperized\Hostfact\Controllers\Parameters
 */
final class CreditorAdd extends ParameterAbstract
{
    /**
     * @Assert\Type("string")
     */
    protected $CreditorCode;
    /**
     * @Assert\Type("string")
     */
    protected $MyCustomerCode;
    /**
     * @Assert\Type("string")
     */
    protected $CompanyName;
    /**
     * @Assert\Type("string")
     */
    protected $CompanyNumber;
    /**
     * @Assert\Type("string")
     */
    protected $TaxNumber;
    /**
     * @Assert\Choice({"m", "f"})
     */
    protected $Sex;
    /**
     * @Assert\Type("string")
     */
    protected $Initials;
    /**
     * @Assert\Type("string")
     */
    protected $SurName;
    /**
     * @Assert\Type("string")
     */
    protected $Address;
    /**
     * @Assert\Type("string")
     */
    protected $ZipCode;
    /**
     * @Assert\Type("string")
     */
    protected $City;
    /**
     * @Assert\Type("string")
     */
    protected $Country;
    /**
     * @Assert\Type("string")
     */
    protected $EmailAddress;
    /**
     * @Assert\Type("string")
     */
    protected $PhoneNumber;
    /**
     * @Assert\Type("string")
     */
    protected $MobileNumber;
    /**
     * @Assert\Type("string")
     */
    protected $FaxNumber;
    /**
     * @Assert\Type("string")
     */
    protected $Comment;
    /**
     * @Assert\Choice({"yes", "no"})
     */
    protected $Authorisation;
    /**
     * @Assert\Type("string")
     */
    protected $AccountNumber;
    /**
     * @Assert\Type("string")
     */
    protected $AccountName;
    /**
     * @Assert\Type("string")
     */
    protected $AccountBank;
    /**
     * @Assert\Type("string")
     */
    protected $AccountCity;
    /**
     * @Assert\Type("string")
     */
    protected $AccountBIC;
    /**
     * @Assert\Type("integer")
     */
    protected $Term;
    /**
     * @Assert\Type("integer")
     */
    protected $groups;
}