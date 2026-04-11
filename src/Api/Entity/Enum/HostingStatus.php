<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity\Enum;

enum HostingStatus: int
{
    case Inactive = 0;
    case Active = 1;
    case Suspended = 2;
}
