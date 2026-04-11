<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity\Enum;

enum InvoiceStatus: int
{
    case Concept = 0;
    case Sent = 1;
    case PartiallyPaid = 2;
    case Paid = 3;
    case Overdue = 4;
    case Credited = 5;
    case Collection = 6;
}
