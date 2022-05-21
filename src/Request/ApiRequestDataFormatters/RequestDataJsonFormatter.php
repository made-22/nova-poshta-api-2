<?php

namespace LisDev\Request\ApiRequestDataFormatters;

use LisDev\Request\ApiRequestDataFormatters\Interfaces\RequestDataFormatterInterface;

class RequestDataJsonFormatter implements RequestDataFormatterInterface
{
    /**
     * @param array $data
     * @return string
     */
    public function convert(array $data): string
    {
        return (string)json_encode($data);
    }
}
