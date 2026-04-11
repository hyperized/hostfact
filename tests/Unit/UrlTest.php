<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Unit;

use Hyperized\ValueObjects\Concretes\Strings\Url;
use Hyperized\ValueObjects\Exceptions\StringException;
use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{
    public function testValidUrl(): void
    {
        $url = Url::fromString('https://example.com/api.php');

        self::assertSame('https://example.com/api.php', $url->getValue());
    }

    public function testValidHttpUrl(): void
    {
        $url = Url::fromString('http://localhost/api.php');

        self::assertSame('http://localhost/api.php', $url->getValue());
    }

    public function testInvalidUrlThrowsException(): void
    {
        $this->expectException(StringException::class);

        Url::fromString('not-a-valid-url');
    }

    public function testEmptyStringThrowsException(): void
    {
        $this->expectException(StringException::class);

        Url::fromString('');
    }
}
