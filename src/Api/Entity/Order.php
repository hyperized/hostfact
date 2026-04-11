<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Entity\Enum\InvoiceMethod;
use Hyperized\Hostfact\Api\Entity\Enum\OrderStatus;
use Hyperized\Hostfact\Api\Entity\Enum\Sex;
use Hyperized\Hostfact\Api\Entity\Enum\VatCalcMethod;
use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class Order extends Entity
{
    /**
     * @param list<OrderLine> $OrderLines
     * @param list<DataBag> $Translations
     * @param list<DataBag> $UsedTaxrates
     */
    public function __construct(
        DataBag $bag,
        public ?int $Identifier,
        public ?string $OrderCode,
        public ?int $Debtor,
        public ?\DateTimeImmutable $Date,
        public ?int $Term,
        public ?string $AmountExcl,
        public ?string $AmountTax,
        public ?string $AmountIncl,
        public ?string $Discount,
        public ?VatCalcMethod $VatCalcMethod,
        public ?bool $IgnoreDiscount,
        public ?string $Coupon,
        public ?string $CompanyName,
        public ?Sex $Sex,
        public ?string $Initials,
        public ?string $SurName,
        public ?string $Address,
        public ?string $ZipCode,
        public ?string $City,
        public ?string $Country,
        public ?string $EmailAddress,
        public ?InvoiceMethod $InvoiceMethod,
        public ?string $Template,
        public ?bool $Authorisation,
        public ?string $PaymentMethod,
        public ?bool $Paid,
        public ?string $TransactionID,
        public ?string $IPAddress,
        public ?string $Comment,
        public ?OrderStatus $Status,
        public ?\DateTimeImmutable $Created,
        public ?\DateTimeImmutable $Modified,
        public ?string $AmountDiscount,
        public ?string $AmountDiscountIncl,
        public array $OrderLines,
        public array $Translations,
        public array $UsedTaxrates,
    ) {
        parent::__construct($bag);
    }

    public static function fromBag(DataBag $bag): static
    {
        $lines = [];
        if ($bag->has('OrderLines')) {
            foreach ($bag->bags('OrderLines') as $lineBag) {
                $lines[] = OrderLine::fromBag($lineBag);
            }
        }

        return new self(
            bag: $bag,
            Identifier: $bag->nullableInt('Identifier'),
            OrderCode: $bag->nullableString('OrderCode'),
            Debtor: $bag->nullableInt('Debtor'),
            Date: $bag->nullableDateTime('Date'),
            Term: $bag->nullableInt('Term'),
            AmountExcl: $bag->nullableString('AmountExcl'),
            AmountTax: $bag->nullableString('AmountTax'),
            AmountIncl: $bag->nullableString('AmountIncl'),
            Discount: $bag->nullableString('Discount'),
            VatCalcMethod: self::nullableEnum($bag, 'VatCalcMethod', VatCalcMethod::class),
            IgnoreDiscount: $bag->nullableBool('IgnoreDiscount'),
            Coupon: $bag->nullableString('Coupon'),
            CompanyName: $bag->nullableString('CompanyName'),
            Sex: self::nullableEnum($bag, 'Sex', Sex::class),
            Initials: $bag->nullableString('Initials'),
            SurName: $bag->nullableString('SurName'),
            Address: $bag->nullableString('Address'),
            ZipCode: $bag->nullableString('ZipCode'),
            City: $bag->nullableString('City'),
            Country: $bag->nullableString('Country'),
            EmailAddress: $bag->nullableString('EmailAddress'),
            InvoiceMethod: self::nullableEnum($bag, 'InvoiceMethod', InvoiceMethod::class),
            Template: $bag->nullableString('Template'),
            Authorisation: $bag->nullableBool('Authorisation'),
            PaymentMethod: $bag->nullableString('PaymentMethod'),
            Paid: $bag->nullableBool('Paid'),
            TransactionID: $bag->nullableString('TransactionID'),
            IPAddress: $bag->nullableString('IPAddress'),
            Comment: $bag->nullableString('Comment'),
            Status: self::nullableEnum($bag, 'Status', OrderStatus::class),
            Created: $bag->nullableDateTime('Created'),
            Modified: $bag->nullableDateTime('Modified'),
            AmountDiscount: $bag->nullableString('AmountDiscount'),
            AmountDiscountIncl: $bag->nullableString('AmountDiscountIncl'),
            OrderLines: $lines,
            Translations: $bag->has('Translations') ? $bag->bags('Translations') : [],
            UsedTaxrates: $bag->has('UsedTaxrates') ? $bag->bags('UsedTaxrates') : [],
        );
    }
}
