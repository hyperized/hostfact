<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity\Enum;

enum DiscountPercentageType: string
{
    case Line = 'line';
    case Total = 'total';
}
