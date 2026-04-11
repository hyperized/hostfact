<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity\Enum;

enum InvoiceSubStatus: int
{
    case None = 0;
    case ReminderSent = 1;
    case SecondReminderSent = 2;
    case SummationSent = 3;
}
