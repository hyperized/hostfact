<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Response;

use Hyperized\Hostfact\Api\Entity\Entity;

final readonly class ShowResponse extends ApiResponse
{
    /**
     * @param array<string, mixed> $raw
     */
    public function __construct(
        string $controller,
        string $action,
        Status $status,
        \DateTimeImmutable $date,
        public DataBag $data,
        public Entity|DataBag $entity,
        array $raw,
    ) {
        parent::__construct($controller, $action, $status, $date, $raw);
    }
}
