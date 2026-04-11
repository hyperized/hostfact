<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Unit;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Hyperized\Hostfact\Exceptions\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class InvalidArgumentExceptionTest extends TestCase
{
    public function testApiFailedMessageFormat(): void
    {
        $guzzleException = new RequestException(
            'Connection refused',
            new Request('POST', 'https://example.com')
        );

        $exception = InvalidArgumentException::apiFailed($guzzleException);

        self::assertSame('API call failed: 0', $exception->getMessage());
        self::assertSame($guzzleException, $exception->getPrevious());
    }

    public function testApiFailedDoesNotExposeRequestDetails(): void
    {
        $guzzleException = new RequestException(
            'Error with https://secret.example.com/api?key=abc123',
            new Request('POST', 'https://secret.example.com/api?key=abc123')
        );

        $exception = InvalidArgumentException::apiFailed($guzzleException);

        self::assertStringNotContainsString('secret.example.com', $exception->getMessage());
        self::assertStringNotContainsString('abc123', $exception->getMessage());
    }

    public function testConfigVariableNotAString(): void
    {
        $exception = InvalidArgumentException::configVariableNotAString();

        self::assertStringContainsString('not a string', $exception->getMessage());
    }

    public function testAllExceptionsExtendInvalidArgumentException(): void
    {
        self::assertInstanceOf(
            \InvalidArgumentException::class,
            InvalidArgumentException::configVariableNotAString()
        );
    }
}
