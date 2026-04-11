<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class Vps extends Entity
{
    /**
     * @param list<DataBag> $Translations
     */
    public function __construct(
        DataBag $bag,
        public ?string $Identifier,
        public ?string $Hostname,
        public ?string $Debtor,
        public ?string $DebtorCode,
        public ?string $IPAddress,
        public ?string $Package,
        public ?string $Node,
        public ?string $ServerID,
        public ?string $Image,
        public ?string $MemoryMB,
        public ?string $DiskSpaceGB,
        public ?string $BandWidthGB,
        public ?string $CPUCores,
        public ?string $Comment,
        public ?string $Status,
        public ?string $Created,
        public ?string $Modified,
        public ?Subscription $Subscription,
        public ?DataBag $NodeInfo,
        public array $Translations,
    ) {
        parent::__construct($bag);
    }

    public static function fromBag(DataBag $bag): static
    {
        return new self(
            bag: $bag,
            Identifier: $bag->nullableString('Identifier'),
            Hostname: $bag->nullableString('Hostname'),
            Debtor: $bag->nullableString('Debtor'),
            DebtorCode: $bag->nullableString('DebtorCode'),
            IPAddress: $bag->nullableString('IPAddress'),
            Package: $bag->nullableString('Package'),
            Node: $bag->nullableString('Node'),
            ServerID: $bag->nullableString('ServerID'),
            Image: $bag->nullableString('Image'),
            MemoryMB: $bag->nullableString('MemoryMB'),
            DiskSpaceGB: $bag->nullableString('DiskSpaceGB'),
            BandWidthGB: $bag->nullableString('BandWidthGB'),
            CPUCores: $bag->nullableString('CPUCores'),
            Comment: $bag->nullableString('Comment'),
            Status: $bag->nullableString('Status'),
            Created: $bag->nullableString('Created'),
            Modified: $bag->nullableString('Modified'),
            Subscription: $bag->has('Subscription') ? Subscription::fromBag($bag->bag('Subscription')) : null,
            NodeInfo: $bag->has('NodeInfo') ? $bag->bag('NodeInfo') : null,
            Translations: $bag->has('Translations') ? $bag->bags('Translations') : [],
        );
    }
}
