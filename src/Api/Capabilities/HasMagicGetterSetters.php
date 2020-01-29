<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Api\Capabilities;

use InvalidArgumentException;

trait HasMagicGetterSetters
{
    public function __get(string $name)
    {
        $function = 'get' . ucfirst($name);

        if (method_exists($this, $function)) {
            return $this->$function();
        }

        if (property_exists($this, $name)) {
            return $this->$name;
        }

        throw new InvalidArgumentException('Property does not exist!');
    }

    public function __set(string $name, $value)
    {
        $function = 'set' . ucfirst($name);

        if (method_exists($this, $function)) {
            return $this->$function($value);
        }

        if (!property_exists($this, $name)) {
            throw new InvalidArgumentException('Property does not exist!');
        }

        $this->$name = $value;
    }
}
