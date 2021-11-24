<?php

namespace Hyperized\Hostfact\Interfaces;

interface FormParameterInterface
{
    /**
     * @param array<string, mixed> $value
     * @return FormParameterInterface
     */
    public static function fromArray(array $value = []): FormParameterInterface;

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array;
}
