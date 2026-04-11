<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity\Enum;

enum GroupType: string
{
    case Debtor = 'debtor';
    case Product = 'product';
    case Creditor = 'creditor';
}
