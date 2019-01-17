<?php declare(strict_types=1);


namespace Hyperized\Hostfact\Controllers\Parameters;


/**
 * Interface ParameterInterface
 *
 * @package Hyperized\Hostfact\Endpoints\Parameters
 */
interface ParameterInterface
{
    /**
     * ParameterInterface constructor.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters);

    /**
     * 
     * ¶
     *
     * @return array
     */
    public function toArray(): array;
}
