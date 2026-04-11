<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Unit\Response;

use Hyperized\Hostfact\Api\Response\Pagination;
use PHPUnit\Framework\TestCase;

class PaginationTest extends TestCase
{
    public function testFromArrayParsesValues(): void
    {
        $pagination = Pagination::fromArray([
            'totalresults' => 50,
            'currentresults' => 10,
            'offset' => 20,
        ]);

        self::assertSame(50, $pagination->totalResults);
        self::assertSame(10, $pagination->currentResults);
        self::assertSame(20, $pagination->offset);
    }

    public function testFromArrayDefaultsToZero(): void
    {
        $pagination = Pagination::fromArray([]);

        self::assertSame(0, $pagination->totalResults);
        self::assertSame(0, $pagination->currentResults);
        self::assertSame(0, $pagination->offset);
    }

    public function testFromArrayCastsStringsToInt(): void
    {
        $pagination = Pagination::fromArray([
            'totalresults' => '25',
            'currentresults' => '10',
            'offset' => '5',
        ]);

        self::assertSame(25, $pagination->totalResults);
        self::assertSame(10, $pagination->currentResults);
        self::assertSame(5, $pagination->offset);
    }

    public function testFromArrayFallsBackToZeroForNonScalar(): void
    {
        $pagination = Pagination::fromArray([
            'totalresults' => ['not', 'scalar'],
            'currentresults' => ['not', 'scalar'],
            'offset' => ['not', 'scalar'],
        ]);

        self::assertSame(0, $pagination->totalResults);
        self::assertSame(0, $pagination->currentResults);
        self::assertSame(0, $pagination->offset);
    }
}
