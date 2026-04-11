<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity\Enum;

enum SslStatus: int
{
    case Inactive = 0;
    case Active = 1;
    case Pending = 2;
    case Expired = 3;
}
