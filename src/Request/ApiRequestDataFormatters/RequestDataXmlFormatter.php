<?php

namespace LisDev\Request\ApiRequestDataFormatters;

use LisDev\Request\ApiRequestDataFormatters\Interfaces\RequestDataFormatterInterface;
use SimpleXMLElement;

class RequestDataXmlFormatter implements RequestDataFormatterInterface
{
    /**
     * @param array $data
     * @return string
     */
    public function convert(array $data): string
    {
        return $this->convertToXml($data);
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
