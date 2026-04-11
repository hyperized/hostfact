<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Response;

/**
 * Typed accessor over entity data from the HostFact API.
 *
 * @implements \ArrayAccess<string, mixed>
 */
final readonly class DataBag implements \ArrayAccess, \Countable
{
    /**
     * @param array<string, mixed> $data
     */
    public function __construct(private array $data)
    {
    }

    public function string(string $key): string
    {
        $value = $this->require($key);

        if (!is_scalar($value)) {
            throw new \InvalidArgumentException("Field '{$key}' cannot be cast to string");
        }

        return (string) $value;
    }

    public function int(string $key): int
    {
        $value = $this->require($key);

        if (!is_scalar($value)) {
            throw new \InvalidArgumentException("Field '{$key}' cannot be cast to int");
        }

        return (int) $value;
    }

    public function float(string $key): float
    {
        $value = $this->require($key);

        if (!is_scalar($value)) {
            throw new \InvalidArgumentException("Field '{$key}' cannot be cast to float");
        }

        return (float) $value;
    }

    public function bool(string $key): bool
    {
        $value = $this->require($key);

        return match ($value) {
            'yes', true, 1, '1' => true,
            'no', false, 0, '0' => false,
            default => throw new \InvalidArgumentException(
                "Field '{$key}' cannot be cast to bool, got: " . var_export($value, true)
            ),
        };
    }

    public function nullableString(string $key): ?string
    {
        $value = $this->data[$key] ?? null;

        if ($value === null) {
            return null;
        }

        if (!is_scalar($value)) {
            throw new \InvalidArgumentException("Field '{$key}' cannot be cast to string");
        }

        return (string) $value;
    }

    public function nullableInt(string $key): ?int
    {
        $value = $this->data[$key] ?? null;

        if ($value === null) {
            return null;
        }

        if (!is_scalar($value)) {
            throw new \InvalidArgumentException("Field '{$key}' cannot be cast to int");
        }

        return (int) $value;
    }

    /**
     * @return array<string, mixed>
     */
    public function array(string $key): array
    {
        $value = $this->require($key);

        if (!is_array($value)) {
            throw new \InvalidArgumentException("Field '{$key}' is not an array");
        }

        /** @var array<string, mixed> $value */
        return $value;
    }

    public function bag(string $key): self
    {
        return new self($this->array($key));
    }

    /**
     * @return list<self>
     */
    public function bags(string $key): array
    {
        $items = $this->array($key);

        /** @var list<self> $result */
        $result = [];
        foreach ($items as $item) {
            if (is_array($item)) {
                /** @var array<string, mixed> $item */
                $result[] = new self($item);
            }
        }

        return $result;
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->data);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->data;
    }

    public function offsetExists(mixed $offset): bool
    {
        return $this->has((string) $offset);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->data[$offset] ?? null;
    }

    public function offsetSet(mixed $offset, mixed $value): never
    {
        throw new \LogicException('DataBag is immutable');
    }

    public function offsetUnset(mixed $offset): never
    {
        throw new \LogicException('DataBag is immutable');
    }

    public function count(): int
    {
        return count($this->data);
    }

    private function require(string $key): mixed
    {
        if (!$this->has($key)) {
            throw new \InvalidArgumentException("Required field '{$key}' is missing");
        }

        return $this->data[$key];
    }
}
