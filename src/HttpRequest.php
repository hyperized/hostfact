<?php

namespace Hyperized\Wefact;

/**
 * Interface HttpRequest
 * @package Hyperized\Wefact
 */
interface HttpRequest
{
    /**
     * @param $value
     * @return mixed
     */
    public function setOptionArray($value);

    /**
     * @return mixed
     */
    public function execute();

    /**
     * @return mixed
     */
    public function getResponse();

    /**
     * @return mixed
     */
    public function getInfo();

    /**
     * @return mixed
     */
    public function getError();

    /**
     * @return mixed
     */
    public function close();
}