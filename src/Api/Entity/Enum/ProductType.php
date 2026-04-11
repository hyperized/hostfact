<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity\Enum;

enum ProductType: string
{
    case Hosting = 'hosting';
    case Domain = 'domain';
    case Ssl = 'ssl';
    case Vps = 'vps';
    case Service = 'service';
    case Other = 'other';
}
