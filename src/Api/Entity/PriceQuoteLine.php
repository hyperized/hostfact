<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Entity\Enum\DiscountPercentageType;
use Hyperized\Hostfact\Api\Entity\Enum\Periodic;
use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class PriceQuoteLine extends Entity
{
    public function __construct(
        DataBag $bag,
        public ?int $Identifier,
        public ?\DateTimeImmutable $Date,
        public ?int $Number,
        public ?string $NumberSuffix,
        public ?string $ProductCode,
        public ?string $Description,
        public ?string $PriceExcl,
        public ?string $DiscountPercentage,
        public ?DiscountPercentageType $DiscountPercentageType,
        public ?string $TaxPercentage,
        public ?int $Periods,
        public ?Periodic $Periodic,
        public ?\DateTimeImmutable $StartPeriod,
        public ?\DateTimeImmutable $EndPeriod,
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
            NumberSuffix: $bag->nullableString('NumberSuffix'),
            ProductCode: $bag->nullableString('ProductCode'),
            Description: $bag->nullableString('Description'),
            PriceExcl: $bag->nullableString('PriceExcl'),
            DiscountPercentage: $bag->nullableString('DiscountPercentage'),
            DiscountPercentageType: self::nullableEnum($bag, 'DiscountPercentageType', DiscountPercentageType::class),
            TaxPercentage: $bag->nullableString('TaxPercentage'),
            Periods: $bag->nullableInt('Periods'),
            Periodic: self::nullableEnum($bag, 'Periodic', Periodic::class),
            StartPeriod: $bag->nullableDateTime('StartPeriod'),
            EndPeriod: $bag->nullableDateTime('EndPeriod'),
            NoDiscountAmountIncl: $bag->nullableString('NoDiscountAmountIncl'),
            NoDiscountAmountExcl: $bag->nullableString('NoDiscountAmountExcl'),
            DiscountAmountIncl: $bag->nullableString('DiscountAmountIncl'),
            DiscountAmountExcl: $bag->nullableString('DiscountAmountExcl'),
        );
    }
}
