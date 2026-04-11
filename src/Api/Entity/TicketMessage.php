<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity;

use Hyperized\Hostfact\Api\Response\DataBag;

final readonly class TicketMessage extends Entity
{
    /**
     * @param list<DataBag> $Attachments
     */
    public function __construct(
        DataBag $bag,
        public ?string $Identifier,
        public ?string $Date,
        public ?string $Subject,
        public ?string $Base64Message,
        public ?string $SenderID,
        public ?string $SenderName,
        public ?string $SenderEmail,
        public array $Attachments,
    ) {
        parent::__construct($bag);
    }

    public static function fromBag(DataBag $bag): static
    {
        return new self(
            bag: $bag,
            Identifier: $bag->nullableString('Identifier'),
            Date: $bag->nullableString('Date'),
            Subject: $bag->nullableString('Subject'),
            Base64Message: $bag->nullableString('Base64Message'),
            SenderID: $bag->nullableString('SenderID'),
            SenderName: $bag->nullableString('SenderName'),
            SenderEmail: $bag->nullableString('SenderEmail'),
            Attachments: $bag->has('Attachments') ? $bag->bags('Attachments') : [],
        );
    }
}
