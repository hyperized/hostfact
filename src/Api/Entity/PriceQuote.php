<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Entity\Enum\InvoiceMethod;
use Hyperized\Hostfact\Api\Entity\Enum\PriceQuoteStatus;
use Hyperized\Hostfact\Api\Entity\Enum\Sex;
use Hyperized\Hostfact\Api\Entity\Enum\VatCalcMethod;
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
        public ?int $Identifier,
        public ?string $PriceQuoteCode,
        public ?int $Debtor,
        public ?string $DebtorCode,
        public ?PriceQuoteStatus $Status,
        public ?\DateTimeImmutable $Date,
        public ?int $Term,
        public ?\DateTimeImmutable $ExpirationDate,
        public ?string $AmountExcl,
        public ?string $AmountTax,
        public ?string $AmountIncl,
        public ?string $TaxRate,
        public ?bool $Compound,
        public ?string $Discount,
        public ?VatCalcMethod $VatCalcMethod,
        public ?bool $IgnoreDiscount,
        public ?string $Coupon,
        public ?string $ReferenceNumber,
        public ?string $CompanyName,
        public ?Sex $Sex,
        public ?string $Initials,
        public ?string $SurName,
        public ?string $Address,
        public ?string $ZipCode,
        public ?string $City,
        public ?string $Country,
        public ?string $EmailAddress,
        public ?InvoiceMethod $PriceQuoteMethod,
        public ?string $Template,
        public ?\DateTimeImmutable $SentDate,
        public ?bool $Sent,
        public ?string $Description,
        public ?string $Comment,
        public ?\DateTimeImmutable $Created,
        public ?\DateTimeImmutable $Modified,
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

    #[\Override]
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
            Identifier: $bag->nullableInt('Identifier'),
            PriceQuoteCode: $bag->nullableString('PriceQuoteCode'),
            Debtor: $bag->nullableInt('Debtor'),
            DebtorCode: $bag->nullableString('DebtorCode'),
            Status: self::nullableEnum($bag, 'Status', PriceQuoteStatus::class),
            Date: $bag->nullableDateTime('Date'),
            Term: $bag->nullableInt('Term'),
            ExpirationDate: $bag->nullableDateTime('ExpirationDate'),
            AmountExcl: $bag->nullableString('AmountExcl'),
            AmountTax: $bag->nullableString('AmountTax'),
            AmountIncl: $bag->nullableString('AmountIncl'),
            TaxRate: $bag->nullableString('TaxRate'),
            Compound: $bag->nullableBool('Compound'),
            Discount: $bag->nullableString('Discount'),
            VatCalcMethod: self::nullableEnum($bag, 'VatCalcMethod', VatCalcMethod::class),
            IgnoreDiscount: $bag->nullableBool('IgnoreDiscount'),
            Coupon: $bag->nullableString('Coupon'),
            ReferenceNumber: $bag->nullableString('ReferenceNumber'),
            CompanyName: $bag->nullableString('CompanyName'),
            Sex: self::nullableEnum($bag, 'Sex', Sex::class),
            Initials: $bag->nullableString('Initials'),
            SurName: $bag->nullableString('SurName'),
            Address: $bag->nullableString('Address'),
            ZipCode: $bag->nullableString('ZipCode'),
            City: $bag->nullableString('City'),
            Country: $bag->nullableString('Country'),
            EmailAddress: $bag->nullableString('EmailAddress'),
            PriceQuoteMethod: self::nullableEnum($bag, 'PriceQuoteMethod', InvoiceMethod::class),
            Template: $bag->nullableString('Template'),
            SentDate: $bag->nullableDateTime('SentDate'),
            Sent: $bag->nullableBool('Sent'),
            Description: $bag->nullableString('Description'),
            Comment: $bag->nullableString('Comment'),
            Created: $bag->nullableDateTime('Created'),
            Modified: $bag->nullableDateTime('Modified'),
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
