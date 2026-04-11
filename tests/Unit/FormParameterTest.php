<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Unit;

use Hyperized\Hostfact\Types\FormParameter;
use PHPUnit\Framework\TestCase;

class FormParameterTest extends TestCase
{
    public function testFromArrayAndToArrayRoundTrip(): void
    {
        $data = ['key' => 'value', 'nested' => ['a' => 1]];
        $param = FormParameter::fromArray($data);

        self::assertSame($data, $param->toArray());
    }

    public function testFromArrayWithEmptyArray(): void
    {
        $param = FormParameter::fromArray();

        self::assertSame([], $param->toArray());
    }

    public function testFromArrayWithExplicitEmptyArray(): void
    {
        $param = FormParameter::fromArray([]);

        self::assertSame([], $param->toArray());
    }
}
