<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class Product extends Entity
{
    /**
     * @param list<DataBag> $Groups
     * @param list<DataBag> $Translations
     */
    public function __construct(
        DataBag $bag,
        public ?string $Identifier,
        public ?string $ProductCode,
        public ?string $ProductName,
        public ?string $ProductKeyPhrase,
        public ?string $ProductDescription,
        public ?string $NumberSuffix,
        public ?string $PriceExcl,
        public ?string $PricePeriod,
        public ?string $TaxPercentage,
        public ?string $Cost,
        public ?string $ProductType,
        public ?string $ProductTld,
        public ?string $PackageID,
        public ?string $HasCustomPrice,
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
            ProductCode: $bag->nullableString('ProductCode'),
            ProductName: $bag->nullableString('ProductName'),
            ProductKeyPhrase: $bag->nullableString('ProductKeyPhrase'),
            ProductDescription: $bag->nullableString('ProductDescription'),
            NumberSuffix: $bag->nullableString('NumberSuffix'),
            PriceExcl: $bag->nullableString('PriceExcl'),
            PricePeriod: $bag->nullableString('PricePeriod'),
            TaxPercentage: $bag->nullableString('TaxPercentage'),
            Cost: $bag->nullableString('Cost'),
            ProductType: $bag->nullableString('ProductType'),
            ProductTld: $bag->nullableString('ProductTld'),
            PackageID: $bag->nullableString('PackageID'),
            HasCustomPrice: $bag->nullableString('HasCustomPrice'),
            Created: $bag->nullableString('Created'),
            Modified: $bag->nullableString('Modified'),
            Groups: $bag->has('Groups') ? $bag->bags('Groups') : [],
            Translations: $bag->has('Translations') ? $bag->bags('Translations') : [],
        );
    }
}
