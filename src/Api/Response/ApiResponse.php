<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Response;

abstract readonly class ApiResponse
{
    /**
     * @param array<string, mixed> $raw
     */
    public function __construct(
        public string $controller,
        public string $action,
        public Status $status,
        public \DateTimeImmutable $date,
        protected array $raw,
    ) {
    }

    public function isSuccess(): bool
    {
        return $this->status === Status::Success;
    }

    public function isError(): bool
    {
        return $this->status === Status::Error;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->raw;
    }
}
