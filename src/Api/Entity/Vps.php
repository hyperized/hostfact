<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Entity\Enum\VpsStatus;
use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class Vps extends Entity
{
    /**
     * @param list<DataBag> $Translations
     */
    public function __construct(
        DataBag $bag,
        public ?int $Identifier,
        public ?string $Hostname,
        public ?int $Debtor,
        public ?string $DebtorCode,
        public ?string $IPAddress,
        public ?string $Package,
        public ?string $Node,
        public ?int $ServerID,
        public ?string $Image,
        public ?int $MemoryMB,
        public ?int $DiskSpaceGB,
        public ?int $BandWidthGB,
        public ?int $CPUCores,
        public ?string $Comment,
        public ?VpsStatus $Status,
        public ?\DateTimeImmutable $Created,
        public ?\DateTimeImmutable $Modified,
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
            Identifier: $bag->nullableInt('Identifier'),
            Hostname: $bag->nullableString('Hostname'),
            Debtor: $bag->nullableInt('Debtor'),
            DebtorCode: $bag->nullableString('DebtorCode'),
            IPAddress: $bag->nullableString('IPAddress'),
            Package: $bag->nullableString('Package'),
            Node: $bag->nullableString('Node'),
            ServerID: $bag->nullableInt('ServerID'),
            Image: $bag->nullableString('Image'),
            MemoryMB: $bag->nullableInt('MemoryMB'),
            DiskSpaceGB: $bag->nullableInt('DiskSpaceGB'),
            BandWidthGB: $bag->nullableInt('BandWidthGB'),
            CPUCores: $bag->nullableInt('CPUCores'),
            Comment: $bag->nullableString('Comment'),
            Status: self::nullableEnum($bag, 'Status', VpsStatus::class),
            Created: $bag->nullableDateTime('Created'),
            Modified: $bag->nullableDateTime('Modified'),
            Subscription: $bag->has('Subscription') ? Subscription::fromBag($bag->bag('Subscription')) : null,
            NodeInfo: $bag->has('NodeInfo') ? $bag->bag('NodeInfo') : null,
            Translations: $bag->has('Translations') ? $bag->bags('Translations') : [],
        );
    }
}
