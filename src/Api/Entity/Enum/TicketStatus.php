<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity\Enum;

enum TicketStatus: int
{
    case Open = 0;
    case Answered = 1;
    case CustomerReply = 2;
    case Closed = 3;
}
