<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Interfaces;

interface EditInterface
{
    public function edit(ModelInterface $model): array;
}
