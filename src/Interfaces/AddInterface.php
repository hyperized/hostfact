<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Interfaces;

interface AddInterface
{
    public function add(ModelInterface $model): array;
}
