<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity\Enum;

enum TicketPriority: string
{
    case Low = 'low';
    case Medium = 'medium';
    case High = 'high';
}
