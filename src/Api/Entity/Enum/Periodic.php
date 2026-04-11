<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity\Enum;

enum Periodic: string
{
    case Month = 'm';
    case Quarter = 'q';
    case HalfYear = 'h';
    case Year = 'j';
    case TwoYears = '2j';
    case ThreeYears = '3j';
    case FourYears = '4j';
    case FiveYears = '5j';
}
