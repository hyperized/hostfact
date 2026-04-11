<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity\Enum;

enum TicketType: string
{
    case Question = 'question';
    case Problem = 'problem';
    case Complaint = 'complaint';
    case Other = 'other';
}
