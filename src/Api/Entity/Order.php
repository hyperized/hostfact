<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

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
        public ?string $Identifier,
        public ?string $OrderCode,
        public ?string $Debtor,
        public ?string $Date,
        public ?string $Term,
        public ?string $AmountExcl,
        public ?string $AmountTax,
        public ?string $AmountIncl,
        public ?string $Discount,
        public ?string $VatCalcMethod,
        public ?string $IgnoreDiscount,
        public ?string $Coupon,
        public ?string $CompanyName,
        public ?string $Sex,
        public ?string $Initials,
        public ?string $SurName,
        public ?string $Address,
        public ?string $ZipCode,
        public ?string $City,
        public ?string $Country,
        public ?string $EmailAddress,
        public ?string $InvoiceMethod,
        public ?string $Template,
        public ?string $Authorisation,
        public ?string $PaymentMethod,
        public ?string $Paid,
        public ?string $TransactionID,
        public ?string $IPAddress,
        public ?string $Comment,
        public ?string $Status,
        public ?string $Created,
        public ?string $Modified,
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
            Identifier: $bag->nullableString('Identifier'),
            OrderCode: $bag->nullableString('OrderCode'),
            Debtor: $bag->nullableString('Debtor'),
            Date: $bag->nullableString('Date'),
            Term: $bag->nullableString('Term'),
            AmountExcl: $bag->nullableString('AmountExcl'),
            AmountTax: $bag->nullableString('AmountTax'),
            AmountIncl: $bag->nullableString('AmountIncl'),
            Discount: $bag->nullableString('Discount'),
            VatCalcMethod: $bag->nullableString('VatCalcMethod'),
            IgnoreDiscount: $bag->nullableString('IgnoreDiscount'),
            Coupon: $bag->nullableString('Coupon'),
            CompanyName: $bag->nullableString('CompanyName'),
            Sex: $bag->nullableString('Sex'),
            Initials: $bag->nullableString('Initials'),
            SurName: $bag->nullableString('SurName'),
            Address: $bag->nullableString('Address'),
            ZipCode: $bag->nullableString('ZipCode'),
            City: $bag->nullableString('City'),
            Country: $bag->nullableString('Country'),
            EmailAddress: $bag->nullableString('EmailAddress'),
            InvoiceMethod: $bag->nullableString('InvoiceMethod'),
            Template: $bag->nullableString('Template'),
            Authorisation: $bag->nullableString('Authorisation'),
            PaymentMethod: $bag->nullableString('PaymentMethod'),
            Paid: $bag->nullableString('Paid'),
            TransactionID: $bag->nullableString('TransactionID'),
            IPAddress: $bag->nullableString('IPAddress'),
            Comment: $bag->nullableString('Comment'),
            Status: $bag->nullableString('Status'),
            Created: $bag->nullableString('Created'),
            Modified: $bag->nullableString('Modified'),
            AmountDiscount: $bag->nullableString('AmountDiscount'),
            AmountDiscountIncl: $bag->nullableString('AmountDiscountIncl'),
            OrderLines: $lines,
            Translations: $bag->has('Translations') ? $bag->bags('Translations') : [],
            UsedTaxrates: $bag->has('UsedTaxrates') ? $bag->bags('UsedTaxrates') : [],
        );
    }
}
