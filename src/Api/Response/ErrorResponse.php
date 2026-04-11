<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Response;

final readonly class ErrorResponse extends ApiResponse
{
    /**
     * @param list<string> $errors
     * @param array<string, mixed> $raw
     */
    public function __construct(
        string $controller,
        string $action,
        Status $status,
        \DateTimeImmutable $date,
        public array $errors,
        array $raw,
    ) {
        parent::__construct($controller, $action, $status, $date, $raw);
    }
}
