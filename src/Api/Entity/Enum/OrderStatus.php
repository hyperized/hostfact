<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity\Enum;

enum OrderStatus: int
{
    case Concept = 0;
    case Pending = 1;
    case Processed = 2;
    case Cancelled = 3;
}
