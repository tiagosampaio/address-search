<?php

declare(strict_types = 1);

namespace AddressSearch\Service;

use AddressSearch\Framework\Http\Response;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Connection
 *
 * @package AddressSearch\Service
 */
class Connection implements ConnectionInterface
{
    /**
     * @var string
     */
    private $protocol = 'https';

    /**
     * @var string
     */
    private $host = 'api.telegram.org';

    /**
     * @var string
     */
    private $token;
    /**
     * @var \Telegram\Service\ClientFactory
     */
    private $clientFactory;
    /**
     * @var Response\SuccessFactory
     */
    private $responseSuccessFactory;
    /**
     * @var Response\ExceptionFactory
     */
    private $responseExceptionFactory;

    /**
     * @var ResultFactory
     */
    private $resultFactory;
    /**
     * Connection constructor.
     * @param ClientFactory             $clientFactory
     * @param Response\SuccessFactory   $responseSuccessFactory
     * @param Response\ExceptionFactory $responseExceptionFactory
     * @param null|string               $token
     */
    public function __construct(
        ClientFactory $clientFactory,
        Response\SuccessFactory $responseSuccessFactory,
        Response\ExceptionFactory $responseExceptionFactory,
        ResultFactory $resultFactory,
        $token = null
    ) {
        $this->token = $token;
        $this->clientFactory = $clientFactory;
        $this->responseSuccessFactory = $responseSuccessFactory;
        $this->responseExceptionFactory = $responseExceptionFactory;
        $this->resultFactory = $resultFactory;
    }
    /**
     * {@inheritdoc}
     */
    public function getToken()
    {
        return (string) $this->token;
    }
    /**
     * {@inheritdoc}
     */
    public function setToken(string $token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function post($resourcePath, array $data = [], array $config = [])
    {
        return $this->request(self::METHOD_POST, $resourcePath, $data, $config);
    }

    /**
     * {@inheritdoc}
     */
    public function get($resourcePath, array $data = [], array $config = [])
    {
        return $this->request(self::METHOD_GET, $resourcePath, $data, $config);
    }
    /**
     * {@inheritdoc}
     */
    public function request($method, $resourcePath, array $data = [], array $config = [])
    {
        $bodyType = 'json';
        if (isset($config['type']) && $config['type']) {
            $bodyType = $config['type'];
        }
        $uri     = $this->buildUri($resourcePath, $config);
        $options = [
            $bodyType => $data
        ];
        return $this->makeRequest($method, $uri, $options);
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $options
     *
     * @return FrameworkResponse\ResponseInterface
     */
    private function makeRequest($method, $uri, array $options = [])
    {
        try {
            /** @var ResponseInterface $response */
            $response = $this->client()->request($method, $uri, $options);
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            return $this->respondException($e);
        } catch (\Exception $e) {
            return $this->respondException($e);
        }
        return $this->respondSuccess($response);
    }

    /**
     * @param ResponseInterface $response
     * @return FrameworkResponse\ResponseInterface
     */
    private function respondSuccess(ResponseInterface $response)
    {
        $response = $this->responseSuccessFactory->create([
            'response' => $response
        ]);

        return $this->sendResult($response);
    }

    /**
     * @param \Exception $exception
     * @return FrameworkResponse\ResponseInterface
     */
    private function respondException(\Exception $exception)
    {
        $response = $this->responseExceptionFactory->create([
            'exception' => $exception
        ]);

        return $this->sendResult($response);
    }

    /**
     * @param FrameworkResponse\ResponseInterface $response
     * @return FrameworkResponse\ResponseInterface
     */
    private function sendResult(FrameworkResponse\ResponseInterface $response)
    {
        return $response;
    }

    /**
     * @return \GuzzleHttp\ClientInterface
     */
    private function client()
    {
        return $this->clientFactory->create();
    }

    /**
     * @param string $resourcePath
     * @param array  $config
     *
     * @return string
     */
    private function buildUri($resourcePath, array $config = [])
    {
        $token = isset($config['token']) ? $config['token'] : null;

        if (empty($token)) {
            $token = $this->token;
        }

        return "{$this->protocol}://{$this->host}/bot{$token}/{$resourcePath}";
    }
}
