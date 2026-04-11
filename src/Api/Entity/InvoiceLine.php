<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class InvoiceLine extends Entity
{
    public function __construct(
        DataBag $bag,
        public ?string $Identifier,
        public ?string $Date,
        public ?string $Number,
        public ?string $NumberSuffix,
        public ?string $ProductCode,
        public ?string $Description,
        public ?string $PriceExcl,
        public ?string $DiscountPercentage,
        public ?string $DiscountPercentageType,
        public ?string $TaxPercentage,
        public ?string $PeriodicID,
        public ?string $Periods,
        public ?string $Periodic,
        public ?string $StartPeriod,
        public ?string $EndPeriod,
        public ?string $ProductType,
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
            Identifier: $bag->nullableString('Identifier'),
            Date: $bag->nullableString('Date'),
            Number: $bag->nullableString('Number'),
            NumberSuffix: $bag->nullableString('NumberSuffix'),
            ProductCode: $bag->nullableString('ProductCode'),
            Description: $bag->nullableString('Description'),
            PriceExcl: $bag->nullableString('PriceExcl'),
            DiscountPercentage: $bag->nullableString('DiscountPercentage'),
            DiscountPercentageType: $bag->nullableString('DiscountPercentageType'),
            TaxPercentage: $bag->nullableString('TaxPercentage'),
            PeriodicID: $bag->nullableString('PeriodicID'),
            Periods: $bag->nullableString('Periods'),
            Periodic: $bag->nullableString('Periodic'),
            StartPeriod: $bag->nullableString('StartPeriod'),
            EndPeriod: $bag->nullableString('EndPeriod'),
            ProductType: $bag->nullableString('ProductType'),
            Reference: $bag->nullableString('Reference'),
            NoDiscountAmountIncl: $bag->nullableString('NoDiscountAmountIncl'),
            NoDiscountAmountExcl: $bag->nullableString('NoDiscountAmountExcl'),
            DiscountAmountIncl: $bag->nullableString('DiscountAmountIncl'),
            DiscountAmountExcl: $bag->nullableString('DiscountAmountExcl'),
        );
    }
}
