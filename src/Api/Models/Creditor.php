<?php declare(strict_types=1);


namespace Hyperized\Hostfact\Api\Models;

use Hyperized\Hostfact\Api\Capabilities\CanAddAttachment;
use Hyperized\Hostfact\Api\Capabilities\CanDeleteAttachment;
use Hyperized\Hostfact\Api\Capabilities\CanDownloadAttachment;
use Hyperized\Hostfact\Api\Types\CompanyName;
use Hyperized\Hostfact\Api\Types\CompanyNumber;
use Hyperized\Hostfact\Api\Types\CreditorCode;
use Hyperized\Hostfact\Api\Types\Identifier;
use Hyperized\Hostfact\Api\Types\MyCustomerCode;

/**
 * Class Creditor
 * @package Hyperized\Hostfact\Api\Models
 * @property Identifier identifier
 * @property CreditorCode creditorCode
 * @property MyCustomerCode myCustomerCode
 * @property CompanyName companyName
 * @property CompanyNumber companyNumber
 */
class Creditor extends Basic
{
    use CanAddAttachment;
    use CanDeleteAttachment;
    use CanDownloadAttachment;

    /**
     * @var CreditorCode
     */
    private $creditorCode;
    /**
     * @var Identifier
     */
    private $identifier;
    /**
     * @var MyCustomerCode
     */
    private $myCustomerCode;
    /**
     * @var CompanyName
     */
    private $companyName;
    /**
     * @var CompanyNumber
     */
    private $companyNumber;

    /**
     * Creditor constructor.
     */
    public function __construct()
    {
        $this->creditorCode = new CreditorCode();
    }

    protected function getIdentifier(): int
    {
        return (int)$this->identifier;
    }

    protected function setIdentifier(int $value): void
    {
        $this->identifier = $value;
    }

    protected function getCreditorCode(): string
    {
        return (string)$this->creditorCode;
    }

    protected function setCreditorCode(string $value): void
    {
        $this->creditorCode = $value;
    }

    public function getMyCustomerCode(): string
    {
        return (string)$this->myCustomerCode;
    }

    public function setMyCustomerCode(string $value): void
    {
        $this->myCustomerCode = $value;
    }
}
