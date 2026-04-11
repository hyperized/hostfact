<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class Ssl extends Entity
{
    public function __construct(
        DataBag $bag,
        public ?string $Identifier,
        public ?string $CommonName,
        public ?string $Debtor,
        public ?string $DebtorCode,
        public ?string $Registrar,
        public ?string $SSLTypeID,
        public ?string $OwnerHandle,
        public ?string $AdminHandle,
        public ?string $TechHandle,
        public ?string $Type,
        public ?string $Wildcard,
        public ?string $MultiDomain,
        public ?string $MultiDomainRecords,
        public ?string $ApproverEmail,
        public ?string $CSR,
        public ?string $ServerSoftware,
        public ?string $Period,
        public ?string $RequestDate,
        public ?string $RenewDate,
        public ?string $RegistrarReference,
        public ?string $Comment,
        public ?string $Status,
        public ?string $Created,
        public ?string $Modified,
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
            Identifier: $bag->nullableString('Identifier'),
            CommonName: $bag->nullableString('CommonName'),
            Debtor: $bag->nullableString('Debtor'),
            DebtorCode: $bag->nullableString('DebtorCode'),
            Registrar: $bag->nullableString('Registrar'),
            SSLTypeID: $bag->nullableString('SSLTypeID'),
            OwnerHandle: $bag->nullableString('OwnerHandle'),
            AdminHandle: $bag->nullableString('AdminHandle'),
            TechHandle: $bag->nullableString('TechHandle'),
            Type: $bag->nullableString('Type'),
            Wildcard: $bag->nullableString('Wildcard'),
            MultiDomain: $bag->nullableString('MultiDomain'),
            MultiDomainRecords: $bag->nullableString('MultiDomainRecords'),
            ApproverEmail: $bag->nullableString('ApproverEmail'),
            CSR: $bag->nullableString('CSR'),
            ServerSoftware: $bag->nullableString('ServerSoftware'),
            Period: $bag->nullableString('Period'),
            RequestDate: $bag->nullableString('RequestDate'),
            RenewDate: $bag->nullableString('RenewDate'),
            RegistrarReference: $bag->nullableString('RegistrarReference'),
            Comment: $bag->nullableString('Comment'),
            Status: $bag->nullableString('Status'),
            Created: $bag->nullableString('Created'),
            Modified: $bag->nullableString('Modified'),
            Subscription: $bag->has('Subscription') ? Subscription::fromBag($bag->bag('Subscription')) : null,
            SSLProductInfo: $bag->has('SSLProductInfo') ? $bag->bag('SSLProductInfo') : null,
            RegistrarInfo: $bag->has('RegistrarInfo') ? $bag->bag('RegistrarInfo') : null,
        );
    }
}
