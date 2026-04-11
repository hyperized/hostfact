<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Entity\Enum\DomainStatus;
use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class Domain extends Entity
{
    /**
     * @param list<DataBag> $Translations
     */
    public function __construct(
        DataBag $bag,
        public ?int $Identifier,
        public ?string $Domain,
        public ?string $Tld,
        public ?int $Debtor,
        public ?string $DebtorCode,
        public ?int $HostingID,
        public ?DomainStatus $Status,
        public ?\DateTimeImmutable $RegistrationDate,
        public ?\DateTimeImmutable $ExpirationDate,
        public ?string $Registrar,
        public ?string $DNS1,
        public ?string $DNS2,
        public ?string $DNS3,
        public ?string $DNS1IP,
        public ?string $DNS2IP,
        public ?string $DNS3IP,
        public ?string $DNSTemplate,
        public ?string $OwnerHandle,
        public ?string $AdminHandle,
        public ?string $TechHandle,
        public ?bool $DomainAutoRenew,
        public ?string $Comment,
        public ?\DateTimeImmutable $Created,
        public ?\DateTimeImmutable $Modified,
        public ?Subscription $Subscription,
        public ?DataBag $RegistrarInfo,
        public array $Translations,
    ) {
        parent::__construct($bag);
    }

    public static function fromBag(DataBag $bag): static
    {
        return new self(
            bag: $bag,
            Identifier: $bag->nullableInt('Identifier'),
            Domain: $bag->nullableString('Domain'),
            Tld: $bag->nullableString('Tld'),
            Debtor: $bag->nullableInt('Debtor'),
            DebtorCode: $bag->nullableString('DebtorCode'),
            HostingID: $bag->nullableInt('HostingID'),
            Status: self::nullableEnum($bag, 'Status', DomainStatus::class),
            RegistrationDate: $bag->nullableDateTime('RegistrationDate'),
            ExpirationDate: $bag->nullableDateTime('ExpirationDate'),
            Registrar: $bag->nullableString('Registrar'),
            DNS1: $bag->nullableString('DNS1'),
            DNS2: $bag->nullableString('DNS2'),
            DNS3: $bag->nullableString('DNS3'),
            DNS1IP: $bag->nullableString('DNS1IP'),
            DNS2IP: $bag->nullableString('DNS2IP'),
            DNS3IP: $bag->nullableString('DNS3IP'),
            DNSTemplate: $bag->nullableString('DNSTemplate'),
            OwnerHandle: $bag->nullableString('OwnerHandle'),
            AdminHandle: $bag->nullableString('AdminHandle'),
            TechHandle: $bag->nullableString('TechHandle'),
            DomainAutoRenew: $bag->nullableBool('DomainAutoRenew'),
            Comment: $bag->nullableString('Comment'),
            Created: $bag->nullableDateTime('Created'),
            Modified: $bag->nullableDateTime('Modified'),
            Subscription: $bag->has('Subscription') ? Subscription::fromBag($bag->bag('Subscription')) : null,
            RegistrarInfo: $bag->has('RegistrarInfo') ? $bag->bag('RegistrarInfo') : null,
            Translations: $bag->has('Translations') ? $bag->bags('Translations') : [],
        );
    }
}
