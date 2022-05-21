<?php

namespace LisDev\Request;

use LisDev\Request\ApiRequestDataFormatters\RequestDataJsonFormatter;
use LisDev\Request\ApiRequestDataFormatters\RequestDataXmlFormatter;

final class ApiRequestSendData
{
    /**
     * @param ApiRequestSettings $requestSettings
     * @param ApiRequestModelData $requestModelData
     */
    public function __construct(
        private ApiRequestSettings $requestSettings,
        private ApiRequestModelData $requestModelData
    ) {
    }

    /**
     * @return ApiRequestSettings
     */
    public function getRequestSettings(): ApiRequestSettings
    {
        return $this->requestSettings;
    }

    /**
     * @return ApiRequestModelData
     */
    public function getRequestModelData(): ApiRequestModelData
    {
        return $this->requestModelData;
    }

    /**
     * @return string
     */
    public function get(): string
    {
        if ($this->requestSettings->getFormat() === 'xml') {
            return (new RequestDataXmlFormatter())->convert($this->generateDataArray());
        }

        return (new RequestDataJsonFormatter())->convert($this->generateDataArray());
    }

    /**
     * @return array
     */
    private function generateDataArray(): array
    {
        return [
            'apiKey' => $this->requestSettings->getKey(),
            'modelName' => $this->requestModelData->getModel(),
            'calledMethod' => $this->requestModelData->getMethod(),
            'language' => $this->requestSettings->getLanguage(),
            'methodProperties' => $this->requestModelData->getParams(),
        ];
    }
}
