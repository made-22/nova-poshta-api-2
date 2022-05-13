<?php

namespace LisDev\Models;

use LisDev\NewPostGateWay;
use LisDev\Request\ApiRequestModelData;
use LisDev\Request\ApiRequestSendData;
use LisDev\Request\ApiRequestSettings;

abstract class NewPostApiBaseModel
{
    /**
     * @param ApiRequestSettings $requestSettings
     */
    public function __construct(
        private ApiRequestSettings $requestSettings
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
     * @param string $model
     * @param string $method
     * @param array|null $params
     * @return NewPostGateWay
     */
    final protected function makeGateWay(string $model, string $method, ?array $params = null): NewPostGateWay
    {
        return new NewPostGateWay(
            $this->makeApiRequestSendData(
                $model,
                $method,
                $params
            )
        );
    }

    /**
     * @param string $model
     * @param string $method
     * @param array|null $params
     * @return ApiRequestModelData
     */
    private function makeApiRequestModelData(string $model, string $method, ?array $params = null): ApiRequestModelData
    {
        return new ApiRequestModelData(
            $model,
            $method,
            $params
        );
    }

    /**
     * @param string $model
     * @param string $method
     * @param array|null $params
     * @return ApiRequestSendData
     */
    private function makeApiRequestSendData(string $model, string $method, ?array $params = null): ApiRequestSendData
    {
        return new ApiRequestSendData(
            $this->requestSettings,
            $this->makeApiRequestModelData(
                $model,
                $method,
                $params
            )
        );
    }
}
