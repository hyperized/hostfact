<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class PriceQuote extends Entity
{
    /**
     * @param list<PriceQuoteLine> $PriceQuoteLines
     * @param list<DataBag> $Attachments
     * @param list<DataBag> $Translations
     * @param list<DataBag> $UsedTaxrates
     */
    public function __construct(
        DataBag $bag,
        public ?string $Identifier,
        public ?string $PriceQuoteCode,
        public ?string $Debtor,
        public ?string $DebtorCode,
        public ?string $Status,
        public ?string $Date,
        public ?string $Term,
        public ?string $ExpirationDate,
        public ?string $AmountExcl,
        public ?string $AmountTax,
        public ?string $AmountIncl,
        public ?string $TaxRate,
        public ?string $Compound,
        public ?string $Discount,
        public ?string $VatCalcMethod,
        public ?string $IgnoreDiscount,
        public ?string $Coupon,
        public ?string $ReferenceNumber,
        public ?string $CompanyName,
        public ?string $Sex,
        public ?string $Initials,
        public ?string $SurName,
        public ?string $Address,
        public ?string $ZipCode,
        public ?string $City,
        public ?string $Country,
        public ?string $EmailAddress,
        public ?string $PriceQuoteMethod,
        public ?string $Template,
        public ?string $SentDate,
        public ?string $Sent,
        public ?string $Description,
        public ?string $Comment,
        public ?string $Created,
        public ?string $Modified,
        public ?string $AcceptURL,
        public ?string $AmountDiscount,
        public ?string $AmountDiscountIncl,
        public array $PriceQuoteLines,
        public array $Attachments,
        public array $Translations,
        public array $UsedTaxrates,
    ) {
        parent::__construct($bag);
    }

    public static function fromBag(DataBag $bag): static
    {
        $lines = [];
        if ($bag->has('PriceQuoteLines')) {
            foreach ($bag->bags('PriceQuoteLines') as $lineBag) {
                $lines[] = PriceQuoteLine::fromBag($lineBag);
            }
        }

        return new self(
            bag: $bag,
            Identifier: $bag->nullableString('Identifier'),
            PriceQuoteCode: $bag->nullableString('PriceQuoteCode'),
            Debtor: $bag->nullableString('Debtor'),
            DebtorCode: $bag->nullableString('DebtorCode'),
            Status: $bag->nullableString('Status'),
            Date: $bag->nullableString('Date'),
            Term: $bag->nullableString('Term'),
            ExpirationDate: $bag->nullableString('ExpirationDate'),
            AmountExcl: $bag->nullableString('AmountExcl'),
            AmountTax: $bag->nullableString('AmountTax'),
            AmountIncl: $bag->nullableString('AmountIncl'),
            TaxRate: $bag->nullableString('TaxRate'),
            Compound: $bag->nullableString('Compound'),
            Discount: $bag->nullableString('Discount'),
            VatCalcMethod: $bag->nullableString('VatCalcMethod'),
            IgnoreDiscount: $bag->nullableString('IgnoreDiscount'),
            Coupon: $bag->nullableString('Coupon'),
            ReferenceNumber: $bag->nullableString('ReferenceNumber'),
            CompanyName: $bag->nullableString('CompanyName'),
            Sex: $bag->nullableString('Sex'),
            Initials: $bag->nullableString('Initials'),
            SurName: $bag->nullableString('SurName'),
            Address: $bag->nullableString('Address'),
            ZipCode: $bag->nullableString('ZipCode'),
            City: $bag->nullableString('City'),
            Country: $bag->nullableString('Country'),
            EmailAddress: $bag->nullableString('EmailAddress'),
            PriceQuoteMethod: $bag->nullableString('PriceQuoteMethod'),
            Template: $bag->nullableString('Template'),
            SentDate: $bag->nullableString('SentDate'),
            Sent: $bag->nullableString('Sent'),
            Description: $bag->nullableString('Description'),
            Comment: $bag->nullableString('Comment'),
            Created: $bag->nullableString('Created'),
            Modified: $bag->nullableString('Modified'),
            AcceptURL: $bag->nullableString('AcceptURL'),
            AmountDiscount: $bag->nullableString('AmountDiscount'),
            AmountDiscountIncl: $bag->nullableString('AmountDiscountIncl'),
            PriceQuoteLines: $lines,
            Attachments: $bag->has('Attachments') ? $bag->bags('Attachments') : [],
            Translations: $bag->has('Translations') ? $bag->bags('Translations') : [],
            UsedTaxrates: $bag->has('UsedTaxrates') ? $bag->bags('UsedTaxrates') : [],
        );
    }
}
