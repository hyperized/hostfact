<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Unit;

use Hyperized\Hostfact\Exceptions\InvalidArgumentException;
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

    public function testFromArrayAcceptsScalarsArraysAndNull(): void
    {
        $data = [
            'string' => 'value',
            'int' => 1,
            'float' => 1.5,
            'bool' => false,
            'null' => null,
            'array' => ['a', 'b'],
        ];

        self::assertSame($data, FormParameter::fromArray($data)->toArray());
    }

    public function testFromArrayRejectsObject(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Form parameter "Debtor" must be a scalar, an array or null');

        FormParameter::fromArray(['Identifier' => 1, 'Debtor' => new \stdClass()]);
    }

    public function testFromArrayRejectsResource(): void
    {
        $resource = fopen('php://memory', 'rb');
        self::assertIsResource($resource);

        try {
            $this->expectException(InvalidArgumentException::class);
            FormParameter::fromArray(['File' => $resource]);
        } finally {
            fclose($resource);
        }
    }

    public function testFromArrayWithExplicitEmptyArray(): void
    {
        $param = FormParameter::fromArray([]);

        self::assertSame([], $param->toArray());
    }
}
