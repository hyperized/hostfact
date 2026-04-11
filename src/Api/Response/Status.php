<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Response;

enum Status: string
{
    case Success = 'success';
    case Error = 'error';
}
