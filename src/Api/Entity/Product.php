<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Entity\Enum\Periodic;
use Hyperized\Hostfact\Api\Entity\Enum\ProductType;
use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class Product extends Entity
{
    /**
     * @param list<DataBag> $Groups
     * @param list<DataBag> $Translations
     */
    public function __construct(
        DataBag $bag,
        public ?int $Identifier,
        public ?string $ProductCode,
        public ?string $ProductName,
        public ?string $ProductKeyPhrase,
        public ?string $ProductDescription,
        public ?string $NumberSuffix,
        public ?string $PriceExcl,
        public ?Periodic $PricePeriod,
        public ?string $TaxPercentage,
        public ?string $Cost,
        public ?ProductType $ProductType,
        public ?string $ProductTld,
        public ?int $PackageID,
        public ?bool $HasCustomPrice,
        public ?\DateTimeImmutable $Created,
        public ?\DateTimeImmutable $Modified,
        public array $Groups,
        public array $Translations,
    ) {
        parent::__construct($bag);
    }

    public static function fromBag(DataBag $bag): static
    {
        return new self(
            bag: $bag,
            Identifier: $bag->nullableInt('Identifier'),
            ProductCode: $bag->nullableString('ProductCode'),
            ProductName: $bag->nullableString('ProductName'),
            ProductKeyPhrase: $bag->nullableString('ProductKeyPhrase'),
            ProductDescription: $bag->nullableString('ProductDescription'),
            NumberSuffix: $bag->nullableString('NumberSuffix'),
            PriceExcl: $bag->nullableString('PriceExcl'),
            PricePeriod: self::nullableEnum($bag, 'PricePeriod', Periodic::class),
            TaxPercentage: $bag->nullableString('TaxPercentage'),
            Cost: $bag->nullableString('Cost'),
            ProductType: self::nullableEnum($bag, 'ProductType', ProductType::class),
            ProductTld: $bag->nullableString('ProductTld'),
            PackageID: $bag->nullableInt('PackageID'),
            HasCustomPrice: $bag->nullableBool('HasCustomPrice'),
            Created: $bag->nullableDateTime('Created'),
            Modified: $bag->nullableDateTime('Modified'),
            Groups: $bag->has('Groups') ? $bag->bags('Groups') : [],
            Translations: $bag->has('Translations') ? $bag->bags('Translations') : [],
        );
    }
}
