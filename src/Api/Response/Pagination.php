<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Response;

final readonly class Pagination
{
    public function __construct(
        public int $totalResults,
        public int $currentResults,
        public int $offset,
    ) {
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        $totalResults = $data['totalresults'] ?? 0;
        $currentResults = $data['currentresults'] ?? 0;
        $offset = $data['offset'] ?? 0;

        return new self(
            totalResults: is_int($totalResults)
                ? $totalResults
                : (int) (is_scalar($totalResults) ? $totalResults : 0),
            currentResults: is_int($currentResults)
                ? $currentResults
                : (int) (is_scalar($currentResults) ? $currentResults : 0),
            offset: is_int($offset)
                ? $offset
                : (int) (is_scalar($offset) ? $offset : 0),
        );
    }
}
