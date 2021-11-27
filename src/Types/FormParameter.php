<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Types;

use Hyperized\Hostfact\Interfaces\FormParameterInterface;

final class FormParameter implements FormParameterInterface
{
    /**
     * @var array<string, mixed>
     */
    private array $value;

    /**
     * @param array<string, mixed> $value
     */
    protected function __construct(array $value = [])
    {
        $this->value = $value;
    }

    /**
     * @param  array<string, mixed> $value
     * @return self
     */
    public static function fromArray(array $value = []): self
    {
        return new self($value);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->value;
    }
}
