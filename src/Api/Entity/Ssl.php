<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Entity\Enum\SslStatus;
use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class Ssl extends Entity
{
    public function __construct(
        DataBag $bag,
        public ?int $Identifier,
        public ?string $CommonName,
        public ?int $Debtor,
        public ?string $DebtorCode,
        public ?string $Registrar,
        public ?int $SSLTypeID,
        public ?string $OwnerHandle,
        public ?string $AdminHandle,
        public ?string $TechHandle,
        public ?string $Type,
        public ?bool $Wildcard,
        public ?bool $MultiDomain,
        public ?int $MultiDomainRecords,
        public ?string $ApproverEmail,
        public ?string $CSR,
        public ?string $ServerSoftware,
        public ?int $Period,
        public ?\DateTimeImmutable $RequestDate,
        public ?\DateTimeImmutable $RenewDate,
        public ?string $RegistrarReference,
        public ?string $Comment,
        public ?SslStatus $Status,
        public ?\DateTimeImmutable $Created,
        public ?\DateTimeImmutable $Modified,
        public ?Subscription $Subscription,
        public ?DataBag $SSLProductInfo,
        public ?DataBag $RegistrarInfo,
    ) {
        parent::__construct($bag);
    }

    public static function fromBag(DataBag $bag): static
    {
        return new self(
            bag: $bag,
            Identifier: $bag->nullableInt('Identifier'),
            CommonName: $bag->nullableString('CommonName'),
            Debtor: $bag->nullableInt('Debtor'),
            DebtorCode: $bag->nullableString('DebtorCode'),
            Registrar: $bag->nullableString('Registrar'),
            SSLTypeID: $bag->nullableInt('SSLTypeID'),
            OwnerHandle: $bag->nullableString('OwnerHandle'),
            AdminHandle: $bag->nullableString('AdminHandle'),
            TechHandle: $bag->nullableString('TechHandle'),
            Type: $bag->nullableString('Type'),
            Wildcard: $bag->nullableBool('Wildcard'),
            MultiDomain: $bag->nullableBool('MultiDomain'),
            MultiDomainRecords: $bag->nullableInt('MultiDomainRecords'),
            ApproverEmail: $bag->nullableString('ApproverEmail'),
            CSR: $bag->nullableString('CSR'),
            ServerSoftware: $bag->nullableString('ServerSoftware'),
            Period: $bag->nullableInt('Period'),
            RequestDate: $bag->nullableDateTime('RequestDate'),
            RenewDate: $bag->nullableDateTime('RenewDate'),
            RegistrarReference: $bag->nullableString('RegistrarReference'),
            Comment: $bag->nullableString('Comment'),
            Status: self::nullableEnum($bag, 'Status', SslStatus::class),
            Created: $bag->nullableDateTime('Created'),
            Modified: $bag->nullableDateTime('Modified'),
            Subscription: $bag->has('Subscription') ? Subscription::fromBag($bag->bag('Subscription')) : null,
            SSLProductInfo: $bag->has('SSLProductInfo') ? $bag->bag('SSLProductInfo') : null,
            RegistrarInfo: $bag->has('RegistrarInfo') ? $bag->bag('RegistrarInfo') : null,
        );
    }
}
