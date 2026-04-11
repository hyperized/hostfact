<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Entity\Enum\HostingStatus;
use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class Hosting extends Entity
{
    /**
     * @param list<DataBag> $Translations
     */
    public function __construct(
        DataBag $bag,
        public ?int $Identifier,
        public ?string $Username,
        public ?int $Debtor,
        public ?string $DebtorCode,
        public ?string $Domain,
        public ?string $Server,
        public ?string $Package,
        public ?string $PackageName,
        public ?string $Comment,
        public ?HostingStatus $Status,
        public ?\DateTimeImmutable $Created,
        public ?\DateTimeImmutable $Modified,
        public ?Subscription $Subscription,
        public ?DataBag $PackageInfo,
        public ?DataBag $ServerInfo,
        public array $Translations,
    ) {
        parent::__construct($bag);
    }

    public static function fromBag(DataBag $bag): static
    {
        return new self(
            bag: $bag,
            Identifier: $bag->nullableInt('Identifier'),
            Username: $bag->nullableString('Username'),
            Debtor: $bag->nullableInt('Debtor'),
            DebtorCode: $bag->nullableString('DebtorCode'),
            Domain: $bag->nullableString('Domain'),
            Server: $bag->nullableString('Server'),
            Package: $bag->nullableString('Package'),
            PackageName: $bag->nullableString('PackageName'),
            Comment: $bag->nullableString('Comment'),
            Status: self::nullableEnum($bag, 'Status', HostingStatus::class),
            Created: $bag->nullableDateTime('Created'),
            Modified: $bag->nullableDateTime('Modified'),
            Subscription: $bag->has('Subscription') ? Subscription::fromBag($bag->bag('Subscription')) : null,
            PackageInfo: $bag->has('PackageInfo') ? $bag->bag('PackageInfo') : null,
            ServerInfo: $bag->has('ServerInfo') ? $bag->bag('ServerInfo') : null,
            Translations: $bag->has('Translations') ? $bag->bags('Translations') : [],
        );
    }
}
