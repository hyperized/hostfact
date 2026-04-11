<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity\Enum;

enum DomainStatus: int
{
    case Inactive = 0;
    case Active = 1;
    case PendingTransfer = 2;
    case PendingRegistration = 3;
}
