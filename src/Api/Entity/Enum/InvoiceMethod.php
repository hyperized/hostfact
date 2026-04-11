<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Entity\Enum;

enum InvoiceMethod: string
{
    case Email = 'email';
    case Post = 'post';
    case EmailAndPost = 'email+post';
}
