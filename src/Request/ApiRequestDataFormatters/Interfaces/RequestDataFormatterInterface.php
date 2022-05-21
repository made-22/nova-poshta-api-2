<?php

namespace LisDev\Request\ApiRequestDataFormatters\Interfaces;

interface RequestDataFormatterInterface
{
    /**
     * @param array $data
     * @return string
     */
    public function convert(array $data): string;
}
