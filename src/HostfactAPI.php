<?php declare(strict_types=1);

namespace Hyperized\Hostfact;

use InvalidArgumentException;


/**
 * Class HostfactAPI
 *
 * @package Hyperized\Hostfact
 */
class HostfactAPI
{
    /**
     * @var string
     */
    protected $controller;
    /**
     * @var
     */
    protected $allowed;
    /**
     * @var
     */
    protected $listType;
    /**
     * @var
     */
    protected $showType;
    /**
     * @var
     */
    protected $addType;

    /**
     * HostfactAPI constructor.
     */
    public function __construct()
    {
        $this->controller = $this->getController();
    }

    /**
     * @return string
     */
    protected function getController(): string
    {
        $class = \get_class($this);
        return strtolower(substr($class, strrpos($class, '\\') + 1));
    }

    /**
     * @param  $method
     * @return bool
     * @throws InvalidArgumentException
     */
    private function isAllowed($method): bool
    {
        if (!\in_array($method, $this->allowed, true)) {
            throw new InvalidArgumentException('No such allowed method: ' . $method);
        }
        return true;
    }

    // Generic function implementations

    /**
     * @param  array $parameters
     * @return array
     * @throws InvalidArgumentException
     */
    public function show(array $parameters): array
    {
        $this->isAllowed(__FUNCTION__);
        return $this->sendRequest(
            $this->controller,
            __FUNCTION__,
            (new $this->showType($parameters))->toArray()
        );
    }

    /**
     * @param array $parameters
     * @return array
     */
    public function list(array $parameters): array
    {
        $this->isAllowed(__FUNCTION__);
        return $this->sendRequest(
            $this->controller,
            __FUNCTION__,
            (new $this->listType($parameters))->toArray()
        );
    }

    /**
     * @param array $parameters
     * @return array
     */
    public function add(array $parameters): array
    {
        $this->isAllowed(__FUNCTION__);
        return $this->sendRequest(
            $this->controller,
            __FUNCTION__,
            (new $this->addType($parameters))->toArray()
        );
    }

    /**
     * @param $controller
     * @param $action
     * @param $params
     *
     * @return array|mixed
     */
    protected function sendRequest($controller, $action, $params)
    {
        return [
            $controller,
            $action,
            $params
        ];

        if (\is_array($params)) {
            $params['api_key'] = config('Hostfact.api_v2_key');
            $params['controller'] = $controller;
            $params['action'] = $action;
        }
        $request = new CurlRequest(config('Hostfact.api_v2_url'));
        $request->setOptionArray(
            [
                CURLOPT_SSL_VERIFYHOST => 2,
                CURLOPT_SSL_VERIFYPEER => true,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_TIMEOUT => config('Hostfact.api_v2_timeout'),
                CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => http_build_query($params),
            ]
        );
        $request->execute();
        $curlError = $request->getError();
        $curlResp = $request->getResponse();
        $request->close();
        if ($curlError !== '') {
            $result = [
                'controller' => 'invalid',
                'action' => 'invalid',
                'status' => 'error',
                'date' => date('c'),
                'errors' => [$curlError],
            ];
        } else {
            $result = json_decode($curlResp, true);
        }
        return $result;
    }

    /**
     * @param array $input
     *
     * @return array|mixed
     */
    protected function _delete(array $input)
    {
        return $this->pseudoRequest('delete', $input);
    }

    /**
     * @param array $input
     *
     * @return array|mixed
     */
    protected function _download(array $input)
    {
        return $this->pseudoRequest('download', $input);
    }

    /**
     * @param array $input
     *
     * @return array|mixed
     */
    protected function _edit(array $input)
    {
        return $this->pseudoRequest('edit', $input);
    }

    /**
     * @param array $input
     *
     * @return array|mixed
     */
    protected function _list(array $input)
    {
        return $this->pseudoRequest('list', $input);
    }

    /**
     * @param array $input
     *
     * @return array|mixed
     */
    protected function _show(array $input)
    {
        return $this->pseudoRequest('show', $input);
    }

    /**
     * @param array $input
     *
     * @return array|mixed
     */
    protected function _terminate(array $input)
    {
        return $this->pseudoRequest('terminate', $input);
    }

    /**
     * @param array $input
     *
     * @return array|mixed
     */
    protected function _lineAdd(array $input)
    {
        return $this->sendRequest($this->mode . 'line', 'add', $input);
    }
    // Mocks a generic request

    /**
     * @param array $input
     *
     * @return array|mixed
     */
    protected function _lineDelete(array $input)
    {
        return $this->sendRequest($this->mode . 'line', 'delete', $input);
    }

    /**
     * @param array $input
     *
     * @return array|mixed
     */
    protected function _sendByEmail(array $input)
    {
        return $this->pseudoRequest('sendbyemail', $input);
    }
}
