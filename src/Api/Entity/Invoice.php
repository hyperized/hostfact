<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Entity\Enum\InvoiceMethod;
use Hyperized\Hostfact\Api\Entity\Enum\InvoiceStatus;
use Hyperized\Hostfact\Api\Entity\Enum\InvoiceSubStatus;
use Hyperized\Hostfact\Api\Entity\Enum\Sex;
use Hyperized\Hostfact\Api\Entity\Enum\VatCalcMethod;
use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class Invoice extends Entity
{
    /**
     * @param list<InvoiceLine> $InvoiceLines
     * @param list<DataBag> $Attachments
     * @param list<DataBag> $Translations
     * @param list<DataBag> $UsedTaxrates
     */
    public function __construct(
        DataBag $bag,
        public ?int $Identifier,
        public ?string $InvoiceCode,
        public ?int $Debtor,
        public ?string $DebtorCode,
        public ?InvoiceStatus $Status,
        public ?InvoiceSubStatus $SubStatus,
        public ?\DateTimeImmutable $Date,
        public ?int $Term,
        public ?\DateTimeImmutable $PayBefore,
        public ?string $PaymentURL,
        public ?string $AmountExcl,
        public ?string $AmountTax,
        public ?string $AmountIncl,
        public ?string $TaxRate,
        public ?bool $Compound,
        public ?string $AmountPaid,
        public ?string $Discount,
        public ?VatCalcMethod $VatCalcMethod,
        public ?bool $IgnoreDiscount,
        public ?string $Coupon,
        public ?string $ReferenceNumber,
        public ?string $CompanyName,
        public ?string $TaxNumber,
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
        public ?\DateTimeImmutable $SentDate,
        public ?bool $Sent,
        public ?int $Reminders,
        public ?\DateTimeImmutable $ReminderDate,
        public ?int $Summations,
        public ?\DateTimeImmutable $SummationDate,
        public ?bool $Authorisation,
        public ?string $PaymentMethod,
        public ?\DateTimeImmutable $PayDate,
        public ?string $TransactionID,
        public ?string $Description,
        public ?string $Comment,
        public ?\DateTimeImmutable $Created,
        public ?\DateTimeImmutable $Modified,
        public ?string $AmountDiscount,
        public ?string $AmountDiscountIncl,
        public array $InvoiceLines,
        public array $Attachments,
        public array $Translations,
        public array $UsedTaxrates,
    ) {
        parent::__construct($bag);
    }

    public static function fromBag(DataBag $bag): static
    {
        $lines = [];
        if ($bag->has('InvoiceLines')) {
            foreach ($bag->bags('InvoiceLines') as $lineBag) {
                $lines[] = InvoiceLine::fromBag($lineBag);
            }
        }

        return new self(
            bag: $bag,
            Identifier: $bag->nullableInt('Identifier'),
            InvoiceCode: $bag->nullableString('InvoiceCode'),
            Debtor: $bag->nullableInt('Debtor'),
            DebtorCode: $bag->nullableString('DebtorCode'),
            Status: self::nullableEnum($bag, 'Status', InvoiceStatus::class),
            SubStatus: self::nullableEnum($bag, 'SubStatus', InvoiceSubStatus::class),
            Date: $bag->nullableDateTime('Date'),
            Term: $bag->nullableInt('Term'),
            PayBefore: $bag->nullableDateTime('PayBefore'),
            PaymentURL: $bag->nullableString('PaymentURL'),
            AmountExcl: $bag->nullableString('AmountExcl'),
            AmountTax: $bag->nullableString('AmountTax'),
            AmountIncl: $bag->nullableString('AmountIncl'),
            TaxRate: $bag->nullableString('TaxRate'),
            Compound: $bag->nullableBool('Compound'),
            AmountPaid: $bag->nullableString('AmountPaid'),
            Discount: $bag->nullableString('Discount'),
            VatCalcMethod: self::nullableEnum($bag, 'VatCalcMethod', VatCalcMethod::class),
            IgnoreDiscount: $bag->nullableBool('IgnoreDiscount'),
            Coupon: $bag->nullableString('Coupon'),
            ReferenceNumber: $bag->nullableString('ReferenceNumber'),
            CompanyName: $bag->nullableString('CompanyName'),
            TaxNumber: $bag->nullableString('TaxNumber'),
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
            SentDate: $bag->nullableDateTime('SentDate'),
            Sent: $bag->nullableBool('Sent'),
            Reminders: $bag->nullableInt('Reminders'),
            ReminderDate: $bag->nullableDateTime('ReminderDate'),
            Summations: $bag->nullableInt('Summations'),
            SummationDate: $bag->nullableDateTime('SummationDate'),
            Authorisation: $bag->nullableBool('Authorisation'),
            PaymentMethod: $bag->nullableString('PaymentMethod'),
            PayDate: $bag->nullableDateTime('PayDate'),
            TransactionID: $bag->nullableString('TransactionID'),
            Description: $bag->nullableString('Description'),
            Comment: $bag->nullableString('Comment'),
            Created: $bag->nullableDateTime('Created'),
            Modified: $bag->nullableDateTime('Modified'),
            AmountDiscount: $bag->nullableString('AmountDiscount'),
            AmountDiscountIncl: $bag->nullableString('AmountDiscountIncl'),
            InvoiceLines: $lines,
            Attachments: $bag->has('Attachments') ? $bag->bags('Attachments') : [],
            Translations: $bag->has('Translations') ? $bag->bags('Translations') : [],
            UsedTaxrates: $bag->has('UsedTaxrates') ? $bag->bags('UsedTaxrates') : [],
        );
    }
}
