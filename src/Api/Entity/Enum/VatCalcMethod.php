<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity\Enum;

enum VatCalcMethod: string
{
    case Inclusive = 'incl';
    case Exclusive = 'excl';
}
