<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class Ticket extends Entity
{
    /**
     * @param list<TicketMessage> $TicketMessages
     * @param list<DataBag> $Translations
     */
    public function __construct(
        DataBag $bag,
        public ?string $Identifier,
        public ?string $TicketID,
        public ?string $Debtor,
        public ?string $DebtorCode,
        public ?string $EmailAddress,
        public ?string $CC,
        public ?string $Type,
        public ?string $Date,
        public ?string $Subject,
        public ?string $Owner,
        public ?string $Priority,
        public ?string $Status,
        public ?string $Comment,
        public ?string $Number,
        public ?string $LastDate,
        public ?string $LastName,
        public array $TicketMessages,
        public array $Translations,
    ) {
        parent::__construct($bag);
    }

    public static function fromBag(DataBag $bag): static
    {
        $messages = [];
        if ($bag->has('TicketMessages')) {
            foreach ($bag->bags('TicketMessages') as $msgBag) {
                $messages[] = TicketMessage::fromBag($msgBag);
            }
        }

        return new self(
            bag: $bag,
            Identifier: $bag->nullableString('Identifier'),
            TicketID: $bag->nullableString('TicketID'),
            Debtor: $bag->nullableString('Debtor'),
            DebtorCode: $bag->nullableString('DebtorCode'),
            EmailAddress: $bag->nullableString('EmailAddress'),
            CC: $bag->nullableString('CC'),
            Type: $bag->nullableString('Type'),
            Date: $bag->nullableString('Date'),
            Subject: $bag->nullableString('Subject'),
            Owner: $bag->nullableString('Owner'),
            Priority: $bag->nullableString('Priority'),
            Status: $bag->nullableString('Status'),
            Comment: $bag->nullableString('Comment'),
            Number: $bag->nullableString('Number'),
            LastDate: $bag->nullableString('LastDate'),
            LastName: $bag->nullableString('LastName'),
            TicketMessages: $messages,
            Translations: $bag->has('Translations') ? $bag->bags('Translations') : [],
        );
    }
}
