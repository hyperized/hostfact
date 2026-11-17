<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Interfaces;

interface FormParameterInterface
{
    /**
     * @param  array<string, mixed> $value
     * @return FormParameterInterface
     */
    public static function fromArray(array $value = []): FormParameterInterface;

    /**
     * @return array<string, scalar|array<mixed>|null>
     */
    public function toArray(): array;
}
