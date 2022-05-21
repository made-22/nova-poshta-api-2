<?php

namespace LisDev\Request;

final class ApiRequestModelData
{
    /**
     * @param string $model
     * @param string $method
     * @param array|null $params
     */
    public function __construct(
        private string $model,
        private string $method,
        private ?array $params
    ) {
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return array|null
     */
    public function getParams(): ?array
    {
        return $this->params;
    }
}
