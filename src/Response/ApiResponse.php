<?php

namespace LisDev\Response;

use GuzzleHttp\Psr7\Response;
use LisDev\Exceptions\BadRequestException;

final class ApiResponse
{
    private string $responseData;

    /**
     * @param Response $response
     * @throws BadRequestException
     */
    public function __construct(
        private Response $response
    ) {
        if ($this->isWrongResponseStatus()) {
            throw new BadRequestException(sprintf('Wrong response status %s', $response->getStatusCode()));
        }

        $this->responseData = $this->response->getBody()->getContents();
    }

    /**
     * @param string $format
     * @return array|string
     */
    public function convertTo(string $format): array|string
    {
        if ($format === 'array') {
            return (array)json_decode($this->responseData, true);
        }

        return $this->responseData;
    }

    /**
     * @return bool
     */
    private function isWrongResponseStatus(): bool
    {
        return $this->response->getStatusCode() >= 300;
    }
}
