<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

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
        public ?string $Identifier,
        public ?string $InvoiceCode,
        public ?string $Debtor,
        public ?string $DebtorCode,
        public ?string $Status,
        public ?string $SubStatus,
        public ?string $Date,
        public ?string $Term,
        public ?string $PayBefore,
        public ?string $PaymentURL,
        public ?string $AmountExcl,
        public ?string $AmountTax,
        public ?string $AmountIncl,
        public ?string $TaxRate,
        public ?string $Compound,
        public ?string $AmountPaid,
        public ?string $Discount,
        public ?string $VatCalcMethod,
        public ?string $IgnoreDiscount,
        public ?string $Coupon,
        public ?string $ReferenceNumber,
        public ?string $CompanyName,
        public ?string $TaxNumber,
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
        public ?string $SentDate,
        public ?string $Sent,
        public ?string $Reminders,
        public ?string $ReminderDate,
        public ?string $Summations,
        public ?string $SummationDate,
        public ?string $Authorisation,
        public ?string $PaymentMethod,
        public ?string $PayDate,
        public ?string $TransactionID,
        public ?string $Description,
        public ?string $Comment,
        public ?string $Created,
        public ?string $Modified,
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
            Identifier: $bag->nullableString('Identifier'),
            InvoiceCode: $bag->nullableString('InvoiceCode'),
            Debtor: $bag->nullableString('Debtor'),
            DebtorCode: $bag->nullableString('DebtorCode'),
            Status: $bag->nullableString('Status'),
            SubStatus: $bag->nullableString('SubStatus'),
            Date: $bag->nullableString('Date'),
            Term: $bag->nullableString('Term'),
            PayBefore: $bag->nullableString('PayBefore'),
            PaymentURL: $bag->nullableString('PaymentURL'),
            AmountExcl: $bag->nullableString('AmountExcl'),
            AmountTax: $bag->nullableString('AmountTax'),
            AmountIncl: $bag->nullableString('AmountIncl'),
            TaxRate: $bag->nullableString('TaxRate'),
            Compound: $bag->nullableString('Compound'),
            AmountPaid: $bag->nullableString('AmountPaid'),
            Discount: $bag->nullableString('Discount'),
            VatCalcMethod: $bag->nullableString('VatCalcMethod'),
            IgnoreDiscount: $bag->nullableString('IgnoreDiscount'),
            Coupon: $bag->nullableString('Coupon'),
            ReferenceNumber: $bag->nullableString('ReferenceNumber'),
            CompanyName: $bag->nullableString('CompanyName'),
            TaxNumber: $bag->nullableString('TaxNumber'),
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
            SentDate: $bag->nullableString('SentDate'),
            Sent: $bag->nullableString('Sent'),
            Reminders: $bag->nullableString('Reminders'),
            ReminderDate: $bag->nullableString('ReminderDate'),
            Summations: $bag->nullableString('Summations'),
            SummationDate: $bag->nullableString('SummationDate'),
            Authorisation: $bag->nullableString('Authorisation'),
            PaymentMethod: $bag->nullableString('PaymentMethod'),
            PayDate: $bag->nullableString('PayDate'),
            TransactionID: $bag->nullableString('TransactionID'),
            Description: $bag->nullableString('Description'),
            Comment: $bag->nullableString('Comment'),
            Created: $bag->nullableString('Created'),
            Modified: $bag->nullableString('Modified'),
            AmountDiscount: $bag->nullableString('AmountDiscount'),
            AmountDiscountIncl: $bag->nullableString('AmountDiscountIncl'),
            InvoiceLines: $lines,
            Attachments: $bag->has('Attachments') ? $bag->bags('Attachments') : [],
            Translations: $bag->has('Translations') ? $bag->bags('Translations') : [],
            UsedTaxrates: $bag->has('UsedTaxrates') ? $bag->bags('UsedTaxrates') : [],
        );
    }
}
