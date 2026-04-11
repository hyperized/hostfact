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

        self::assertSame(
            'API call returned an invalid response: Connection refused.',
            $exception->getMessage()
        );
    }

    public function testApiFailedPreservesExceptionMessage(): void
    {
        $guzzleException = new RequestException(
            'Timeout exceeded',
            new Request('POST', 'https://example.com')
        );

        $exception = InvalidArgumentException::apiFailed($guzzleException);

        self::assertStringStartsWith('API call returned an invalid response: ', $exception->getMessage());
        self::assertStringEndsWith('.', $exception->getMessage());
        self::assertStringContainsString('Timeout exceeded', $exception->getMessage());
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
