<?php

namespace LisDev\Request;

use SimpleXMLElement;

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
            return $this->convertToXml(
                $this->generateDataArray()
            );
        }

        return $this->convertToJson(
            $this->generateDataArray()
        );
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

    /**
     * @param array $data
     * @return string
     */
    private function convertToJson(array $data): string
    {
        return (string)json_encode($data);
    }

    /**
     * @param array $data
     * @param SimpleXMLElement|null $xml
     * @return string
     */
    private function convertToXml(array $data, ?SimpleXMLElement $xml = null): string
    {
        $xml = $xml ?? new SimpleXMLElement('<root/>');

        foreach ($data as $key => $value) {
            if (is_numeric($key)) {
                $key = 'item';
            }

            if (is_array($value)) {
                return $this->convertToXml($value, $xml->addChild($key));
            } else {
                $xml->addChild($key, $value);
            }
        }

        return (string)$xml->asXML();
    }
}
