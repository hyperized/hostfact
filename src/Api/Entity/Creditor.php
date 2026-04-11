<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Entity\Enum\Sex;
use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class Creditor extends Entity
{
    /**
     * @param list<DataBag> $Groups
     * @param list<DataBag> $Translations
     */
    public function __construct(
        DataBag $bag,
        public ?int $Identifier,
        public ?string $CreditorCode,
        public ?string $MyCustomerCode,
        public ?string $CompanyName,
        public ?string $CompanyNumber,
        public ?string $TaxNumber,
        public ?Sex $Sex,
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
        public ?bool $Authorisation,
        public ?string $AccountNumber,
        public ?string $AccountBIC,
        public ?string $AccountName,
        public ?string $AccountBank,
        public ?string $AccountCity,
        public ?int $Term,
        public ?\DateTimeImmutable $Created,
        public ?\DateTimeImmutable $Modified,
        public array $Groups,
        public array $Translations,
    ) {
        parent::__construct($bag);
    }

    #[\Override]
    public static function fromBag(DataBag $bag): static
    {
        return new self(
            bag: $bag,
            Identifier: $bag->nullableInt('Identifier'),
            CreditorCode: $bag->nullableString('CreditorCode'),
            MyCustomerCode: $bag->nullableString('MyCustomerCode'),
            CompanyName: $bag->nullableString('CompanyName'),
            CompanyNumber: $bag->nullableString('CompanyNumber'),
            TaxNumber: $bag->nullableString('TaxNumber'),
            Sex: self::nullableEnum($bag, 'Sex', Sex::class),
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
            Authorisation: $bag->nullableBool('Authorisation'),
            AccountNumber: $bag->nullableString('AccountNumber'),
            AccountBIC: $bag->nullableString('AccountBIC'),
            AccountName: $bag->nullableString('AccountName'),
            AccountBank: $bag->nullableString('AccountBank'),
            AccountCity: $bag->nullableString('AccountCity'),
            Term: $bag->nullableInt('Term'),
            Created: $bag->nullableDateTime('Created'),
            Modified: $bag->nullableDateTime('Modified'),
            Groups: $bag->has('Groups') ? $bag->bags('Groups') : [],
            Translations: $bag->has('Translations') ? $bag->bags('Translations') : [],
        );
    }
}
