<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Entity\Enum\DiscountPercentageType;
use Hyperized\Hostfact\Api\Entity\Enum\Periodic;
use Hyperized\Hostfact\Api\Entity\Enum\ProductType;
use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class OrderLine extends Entity
{
    public function __construct(
        DataBag $bag,
        public ?int $Identifier,
        public ?\DateTimeImmutable $Date,
        public ?int $Number,
        public ?string $ProductCode,
        public ?string $Description,
        public ?string $PriceExcl,
        public ?string $TaxPercentage,
        public ?string $DiscountPercentage,
        public ?DiscountPercentageType $DiscountPercentageType,
        public ?int $Periods,
        public ?Periodic $Periodic,
        public ?ProductType $ProductType,
        public ?string $Reference,
        public ?string $NoDiscountAmountIncl,
        public ?string $NoDiscountAmountExcl,
        public ?string $DiscountAmountIncl,
        public ?string $DiscountAmountExcl,
    ) {
        parent::__construct($bag);
    }

    public static function fromBag(DataBag $bag): static
    {
        return new self(
            bag: $bag,
            Identifier: $bag->nullableInt('Identifier'),
            Date: $bag->nullableDateTime('Date'),
            Number: $bag->nullableInt('Number'),
            ProductCode: $bag->nullableString('ProductCode'),
            Description: $bag->nullableString('Description'),
            PriceExcl: $bag->nullableString('PriceExcl'),
            TaxPercentage: $bag->nullableString('TaxPercentage'),
            DiscountPercentage: $bag->nullableString('DiscountPercentage'),
            DiscountPercentageType: self::nullableEnum($bag, 'DiscountPercentageType', DiscountPercentageType::class),
            Periods: $bag->nullableInt('Periods'),
            Periodic: self::nullableEnum($bag, 'Periodic', Periodic::class),
            ProductType: self::nullableEnum($bag, 'ProductType', ProductType::class),
            Reference: $bag->nullableString('Reference'),
            NoDiscountAmountIncl: $bag->nullableString('NoDiscountAmountIncl'),
            NoDiscountAmountExcl: $bag->nullableString('NoDiscountAmountExcl'),
            DiscountAmountIncl: $bag->nullableString('DiscountAmountIncl'),
            DiscountAmountExcl: $bag->nullableString('DiscountAmountExcl'),
        );
    }
}
