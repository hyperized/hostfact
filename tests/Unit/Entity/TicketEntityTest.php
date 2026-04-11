<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Unit\Entity;

use Hyperized\Hostfact\Api\Entity\Enum\TicketStatus;
use Hyperized\Hostfact\Api\Entity\Ticket;
use Hyperized\Hostfact\Api\Entity\TicketMessage;
use Hyperized\Hostfact\Api\Response\DataBag;
use PHPUnit\Framework\TestCase;

class TicketEntityTest extends TestCase
{
    public function testFromBagHydratesTicketMessages(): void
    {
        $bag = new DataBag([
            'Identifier' => '12',
            'TicketID' => 'T-0001',
            'Status' => '1',
            'TicketMessages' => [
                [
                    'Identifier' => '1',
                    'Date' => '2024-03-01 10:00:00',
                    'Subject' => 'Help needed',
                    'Base64Message' => base64_encode('Hello'),
                    'SenderID' => '5',
                    'SenderName' => 'Jan',
                    'SenderEmail' => 'jan@example.com',
                    'Attachments' => [
                        ['Filename' => 'screenshot.png'],
                    ],
                ],
            ],
        ]);

        $ticket = Ticket::fromBag($bag);

        self::assertSame(12, $ticket->Identifier);
        self::assertSame('T-0001', $ticket->TicketID);
        self::assertSame(TicketStatus::Answered, $ticket->Status);
        self::assertCount(1, $ticket->TicketMessages);
        self::assertInstanceOf(TicketMessage::class, $ticket->TicketMessages[0]);
        self::assertSame(1, $ticket->TicketMessages[0]->Identifier);
        self::assertSame('Help needed', $ticket->TicketMessages[0]->Subject);
        self::assertSame(5, $ticket->TicketMessages[0]->SenderID);
        self::assertSame('Jan', $ticket->TicketMessages[0]->SenderName);
        self::assertInstanceOf(\DateTimeImmutable::class, $ticket->TicketMessages[0]->Date);
        self::assertCount(1, $ticket->TicketMessages[0]->Attachments);
    }

    public function testFromBagWithoutTicketMessages(): void
    {
        $ticket = Ticket::fromBag(new DataBag([]));

        self::assertEmpty($ticket->TicketMessages);
    }

    public function testTicketMessageBagIsAccessible(): void
    {
        $bag = new DataBag([
            'TicketMessages' => [
                ['Identifier' => '1', 'Custom' => 'field'],
            ],
        ]);

        $ticket = Ticket::fromBag($bag);

        self::assertSame('field', $ticket->TicketMessages[0]->bag->string('Custom'));
    }
}
