<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Entity\Enum\TicketPriority;
use Hyperized\Hostfact\Api\Entity\Enum\TicketStatus;
use Hyperized\Hostfact\Api\Entity\Enum\TicketType;
use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class Ticket extends Entity
{
    /**
     * @param list<TicketMessage> $TicketMessages
     * @param list<DataBag> $Translations
     */
    public function __construct(
        DataBag $bag,
        public ?int $Identifier,
        public ?string $TicketID,
        public ?int $Debtor,
        public ?string $DebtorCode,
        public ?string $EmailAddress,
        public ?string $CC,
        public ?TicketType $Type,
        public ?\DateTimeImmutable $Date,
        public ?string $Subject,
        public ?string $Owner,
        public ?TicketPriority $Priority,
        public ?TicketStatus $Status,
        public ?string $Comment,
        public ?int $Number,
        public ?\DateTimeImmutable $LastDate,
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
            Identifier: $bag->nullableInt('Identifier'),
            TicketID: $bag->nullableString('TicketID'),
            Debtor: $bag->nullableInt('Debtor'),
            DebtorCode: $bag->nullableString('DebtorCode'),
            EmailAddress: $bag->nullableString('EmailAddress'),
            CC: $bag->nullableString('CC'),
            Type: self::nullableEnum($bag, 'Type', TicketType::class),
            Date: $bag->nullableDateTime('Date'),
            Subject: $bag->nullableString('Subject'),
            Owner: $bag->nullableString('Owner'),
            Priority: self::nullableEnum($bag, 'Priority', TicketPriority::class),
            Status: self::nullableEnum($bag, 'Status', TicketStatus::class),
            Comment: $bag->nullableString('Comment'),
            Number: $bag->nullableInt('Number'),
            LastDate: $bag->nullableDateTime('LastDate'),
            LastName: $bag->nullableString('LastName'),
            TicketMessages: $messages,
            Translations: $bag->has('Translations') ? $bag->bags('Translations') : [],
        );
    }
}
