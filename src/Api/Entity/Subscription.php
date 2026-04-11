<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Entity\Enum\Periodic;
use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class Subscription extends Entity
{
    public function __construct(
        DataBag $bag,
        public ?int $Number,
        public ?string $NumberSuffix,
        public ?string $ProductCode,
        public ?string $Description,
        public ?string $PriceExcl,
        public ?string $PriceIncl,
        public ?string $TaxPercentage,
        public ?string $DiscountPercentage,
        public ?int $Periods,
        public ?Periodic $Periodic,
        public ?\DateTimeImmutable $StartPeriod,
        public ?\DateTimeImmutable $EndPeriod,
        public ?\DateTimeImmutable $NextDate,
        public ?int $ContractPeriods,
        public ?Periodic $ContractPeriodic,
        public ?\DateTimeImmutable $StartContract,
        public ?\DateTimeImmutable $EndContract,
        public ?\DateTimeImmutable $TerminationDate,
        public ?bool $Reminder,
        public ?bool $InvoiceAuthorisation,
        public ?string $AmountExcl,
        public ?string $AmountIncl,
    ) {
        parent::__construct($bag);
    }

    public static function fromBag(DataBag $bag): static
    {
        return new self(
            bag: $bag,
            Number: $bag->nullableInt('Number'),
            NumberSuffix: $bag->nullableString('NumberSuffix'),
            ProductCode: $bag->nullableString('ProductCode'),
            Description: $bag->nullableString('Description'),
            PriceExcl: $bag->nullableString('PriceExcl'),
            PriceIncl: $bag->nullableString('PriceIncl'),
            TaxPercentage: $bag->nullableString('TaxPercentage'),
            DiscountPercentage: $bag->nullableString('DiscountPercentage'),
            Periods: $bag->nullableInt('Periods'),
            Periodic: self::nullableEnum($bag, 'Periodic', Periodic::class),
            StartPeriod: $bag->nullableDateTime('StartPeriod'),
            EndPeriod: $bag->nullableDateTime('EndPeriod'),
            NextDate: $bag->nullableDateTime('NextDate'),
            ContractPeriods: $bag->nullableInt('ContractPeriods'),
            ContractPeriodic: self::nullableEnum($bag, 'ContractPeriodic', Periodic::class),
            StartContract: $bag->nullableDateTime('StartContract'),
            EndContract: $bag->nullableDateTime('EndContract'),
            TerminationDate: $bag->nullableDateTime('TerminationDate'),
            Reminder: $bag->nullableBool('Reminder'),
            InvoiceAuthorisation: $bag->nullableBool('InvoiceAuthorisation'),
            AmountExcl: $bag->nullableString('AmountExcl'),
            AmountIncl: $bag->nullableString('AmountIncl'),
        );
    }
}
