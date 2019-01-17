<?php

namespace Hyperized\Hostfact;

/**
 * Class CurlRequest
 *
 * @package Hyperized\Hostfact
 */
class CurlRequest implements HttpRequest
{
    /**
     * @var resource
     */
    private $handler;
    /**
     * @var
     */
    private $response;

    /**
     * CurlRequest constructor.
     *
     * @param $url
     */
    public function __construct($url)
    {
        $this->handler = curl_init($url);
    }

    /**
     * @param  $value
     * @return mixed
     */
    public function setOptionArray($value)
    {
        return curl_setopt_array($this->handler, $value);
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        $this->response = curl_exec($this->handler);
        return true;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return mixed
     */
    public function getInfo()
    {
        return curl_getinfo($this->handler);
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return curl_error($this->handler);
    }

    /**
     * Close all connections
     */
    public function __destruct()
    {
        if (\is_resource($this->handler)) {
            $this->close();
        }
    }

    /**
     * @return mixed
     */
    public function close()
    {
        curl_close($this->handler);
    }
}
