<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity\Enum;

enum PriceQuoteStatus: int
{
    case Concept = 0;
    case Sent = 1;
    case Accepted = 2;
    case Declined = 3;
    case Expired = 4;
}
