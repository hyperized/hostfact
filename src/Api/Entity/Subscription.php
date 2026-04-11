<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class Subscription extends Entity
{
    public function __construct(
        DataBag $bag,
        public ?string $Number,
        public ?string $NumberSuffix,
        public ?string $ProductCode,
        public ?string $Description,
        public ?string $PriceExcl,
        public ?string $PriceIncl,
        public ?string $TaxPercentage,
        public ?string $DiscountPercentage,
        public ?string $Periods,
        public ?string $Periodic,
        public ?string $StartPeriod,
        public ?string $EndPeriod,
        public ?string $NextDate,
        public ?string $ContractPeriods,
        public ?string $ContractPeriodic,
        public ?string $StartContract,
        public ?string $EndContract,
        public ?string $TerminationDate,
        public ?string $Reminder,
        public ?string $InvoiceAuthorisation,
        public ?string $AmountExcl,
        public ?string $AmountIncl,
    ) {
        parent::__construct($bag);
    }

    public static function fromBag(DataBag $bag): static
    {
        return new self(
            bag: $bag,
            Number: $bag->nullableString('Number'),
            NumberSuffix: $bag->nullableString('NumberSuffix'),
            ProductCode: $bag->nullableString('ProductCode'),
            Description: $bag->nullableString('Description'),
            PriceExcl: $bag->nullableString('PriceExcl'),
            PriceIncl: $bag->nullableString('PriceIncl'),
            TaxPercentage: $bag->nullableString('TaxPercentage'),
            DiscountPercentage: $bag->nullableString('DiscountPercentage'),
            Periods: $bag->nullableString('Periods'),
            Periodic: $bag->nullableString('Periodic'),
            StartPeriod: $bag->nullableString('StartPeriod'),
            EndPeriod: $bag->nullableString('EndPeriod'),
            NextDate: $bag->nullableString('NextDate'),
            ContractPeriods: $bag->nullableString('ContractPeriods'),
            ContractPeriodic: $bag->nullableString('ContractPeriodic'),
            StartContract: $bag->nullableString('StartContract'),
            EndContract: $bag->nullableString('EndContract'),
            TerminationDate: $bag->nullableString('TerminationDate'),
            Reminder: $bag->nullableString('Reminder'),
            InvoiceAuthorisation: $bag->nullableString('InvoiceAuthorisation'),
            AmountExcl: $bag->nullableString('AmountExcl'),
            AmountIncl: $bag->nullableString('AmountIncl'),
        );
    }
}
