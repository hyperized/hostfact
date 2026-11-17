<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Types;

use Hyperized\Hostfact\Exceptions\InvalidArgumentException;
use Hyperized\Hostfact\Interfaces\FormParameterInterface;

final readonly class FormParameter implements FormParameterInterface
{
    /**
     * @param array<string, scalar|array<mixed>|null> $value
     */
    protected function __construct(private array $value = [])
    {
    }

    /**
     * Only top-level values are checked; nested arrays are passed through as given.
     *
     * @param  array<string, mixed> $value
     * @return self
     * @throws InvalidArgumentException when a value cannot be sent as a form field
     */
    public static function fromArray(array $value = []): self
    {
        $checked = [];
        foreach ($value as $name => $item) {
            if (!is_scalar($item) && !is_array($item) && $item !== null) {
                throw InvalidArgumentException::formParameterNotEncodable($name);
            }
            $checked[$name] = $item;
        }

        return new self($checked);
    }

    /**
     * @return array<string, scalar|array<mixed>|null>
     */
    public function toArray(): array
    {
        return $this->value;
    }
}
