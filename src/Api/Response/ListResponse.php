<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Response;

use Hyperized\Hostfact\Api\Entity\Entity;

final readonly class ListResponse extends ApiResponse
{
    /**
     * @param list<DataBag> $items
     * @param list<Entity|DataBag> $entities
     * @param array<string, mixed> $raw
     */
    public function __construct(
        string $controller,
        string $action,
        Status $status,
        \DateTimeImmutable $date,
        public Pagination $pagination,
        public array $items,
        public array $entities,
        array $raw,
    ) {
        parent::__construct($controller, $action, $status, $date, $raw);
    }
}
