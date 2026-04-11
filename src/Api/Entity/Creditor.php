<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class Creditor extends Entity
{
    /**
     * @param list<DataBag> $Groups
     * @param list<DataBag> $Translations
     */
    public function __construct(
        DataBag $bag,
        public ?string $Identifier,
        public ?string $CreditorCode,
        public ?string $MyCustomerCode,
        public ?string $CompanyName,
        public ?string $CompanyNumber,
        public ?string $TaxNumber,
        public ?string $Sex,
        public ?string $Initials,
        public ?string $SurName,
        public ?string $Address,
        public ?string $ZipCode,
        public ?string $City,
        public ?string $Country,
        public ?string $EmailAddress,
        public ?string $PhoneNumber,
        public ?string $MobileNumber,
        public ?string $FaxNumber,
        public ?string $Comment,
        public ?string $Authorisation,
        public ?string $AccountNumber,
        public ?string $AccountBIC,
        public ?string $AccountName,
        public ?string $AccountBank,
        public ?string $AccountCity,
        public ?string $Term,
        public ?string $Created,
        public ?string $Modified,
        public array $Groups,
        public array $Translations,
    ) {
        parent::__construct($bag);
    }

    public static function fromBag(DataBag $bag): static
    {
        return new self(
            bag: $bag,
            Identifier: $bag->nullableString('Identifier'),
            CreditorCode: $bag->nullableString('CreditorCode'),
            MyCustomerCode: $bag->nullableString('MyCustomerCode'),
            CompanyName: $bag->nullableString('CompanyName'),
            CompanyNumber: $bag->nullableString('CompanyNumber'),
            TaxNumber: $bag->nullableString('TaxNumber'),
            Sex: $bag->nullableString('Sex'),
            Initials: $bag->nullableString('Initials'),
            SurName: $bag->nullableString('SurName'),
            Address: $bag->nullableString('Address'),
            ZipCode: $bag->nullableString('ZipCode'),
            City: $bag->nullableString('City'),
            Country: $bag->nullableString('Country'),
            EmailAddress: $bag->nullableString('EmailAddress'),
            PhoneNumber: $bag->nullableString('PhoneNumber'),
            MobileNumber: $bag->nullableString('MobileNumber'),
            FaxNumber: $bag->nullableString('FaxNumber'),
            Comment: $bag->nullableString('Comment'),
            Authorisation: $bag->nullableString('Authorisation'),
            AccountNumber: $bag->nullableString('AccountNumber'),
            AccountBIC: $bag->nullableString('AccountBIC'),
            AccountName: $bag->nullableString('AccountName'),
            AccountBank: $bag->nullableString('AccountBank'),
            AccountCity: $bag->nullableString('AccountCity'),
            Term: $bag->nullableString('Term'),
            Created: $bag->nullableString('Created'),
            Modified: $bag->nullableString('Modified'),
            Groups: $bag->has('Groups') ? $bag->bags('Groups') : [],
            Translations: $bag->has('Translations') ? $bag->bags('Translations') : [],
        );
    }
}
