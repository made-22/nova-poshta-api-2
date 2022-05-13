<?php

namespace LisDev;

use GuzzleHttp\Client;
use LisDev\Exceptions\BadRequestException;
use LisDev\Request\ApiRequestSendData;
use LisDev\Response\ApiResponse;
use Throwable;

final class NewPostGateWay
{
    private const API_URI = 'https://api.novaposhta.ua/v2.0';

    private Client $httpClient;

    /**
     * @param ApiRequestSendData $requestData
     */
    public function __construct(
        private ApiRequestSendData $requestData
    ) {
        $this->httpClient = new Client([
            'base_uri' => $this->getBaseUrl(),
            'timeout' => $this->requestData->getRequestSettings()->getTimeout(),
            'headers' => $this->getBaseHeaders()
        ]);
    }

    /**
     * @return array|string
     * @throws BadRequestException
     */
    public function send(): array|string
    {
        try {
            $response = $this->httpClient->post('', [
                'body' => $this->requestData->get()
            ]);

            $apiResponse = new ApiResponse($response);

            return $apiResponse->convertTo(
                $this->requestData->getRequestSettings()->getResponseFormat()
            );

        } catch (Throwable $e) {
            throw new BadRequestException(sprintf('Request sending error: %s', $e->getMessage()));
        }
    }

    /**
     * @return string
     */
    private function getBaseUrl(): string
    {
        $endpointType = $this->requestData->getRequestSettings()->getFormat() === 'xml' ? 'xml' : 'json';

        return sprintf('%s/%s/', self::API_URI, $endpointType);
    }

    /**
     * @return array
     */
    private function getBaseHeaders(): array
    {
        $contentType = $this->requestData->getRequestSettings()->getFormat() === 'xml' ? 'text/xml' : 'application/json';

        return [
            'Content-Type' => $contentType,
        ];
    }
}
