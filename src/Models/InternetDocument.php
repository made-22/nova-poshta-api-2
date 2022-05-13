<?php

namespace LisDev\Models;

use LisDev\Exceptions\BadRequestException;
use LisDev\Models\Traits\EditTrait;

class InternetDocument extends NewPostApiBaseModel
{
    use EditTrait;

    protected string $model = 'InternetDocument';

    /**
     * @param string $citySender
     * @param string $cityRecipient
     * @param string $serviceType
     * @param float $weight
     * @param float $cost
     * @return array|string
     * @throws BadRequestException
     */
    public function getDocumentPrice(
        string $citySender,
        string $cityRecipient,
        string $serviceType,
        float $weight,
        float $cost
    ): array|string {
        return $this->makeGateWay($this->model, 'getDocumentPrice', [
            'CitySender' => $citySender,
            'CityRecipient' => $cityRecipient,
            'ServiceType' => $serviceType,
            'Weight' => $weight,
            'Cost' => $cost,
        ])->send();
    }

    /**
     * @param string $citySender
     * @param string $cityRecipient
     * @param string $serviceType
     * @param string $dateTime
     * @return array|string
     * @throws BadRequestException
     */
    public function getDocumentDeliveryDate(
        string $citySender,
        string $cityRecipient,
        string $serviceType,
        string $dateTime
    ): array|string {
        return $this->makeGateWay($this->model, 'getDocumentDeliveryDate', [
            'CitySender' => $citySender,
            'CityRecipient' => $cityRecipient,
            'ServiceType' => $serviceType,
            'DateTime' => $dateTime,
        ])->send();
    }

    /**
     * @param array|null $params
     * @return array|string
     * @throws BadRequestException
     */
    public function getDocumentList(array $params = null): array|string
    {
        return $this->makeGateWay($this->model, 'getDocumentList', $params)
            ->send();
    }

    /**
     * @param string $ref
     * @return array|string
     * @throws BadRequestException
     */
    public function getDocument(string $ref): array|string
    {
        return $this->makeGateWay($this->model, 'getDocument', [
            'Ref' => $ref,
        ])->send();
    }

    /**
     * @param array $params
     * @return array|string
     * @throws BadRequestException
     */
    public function generateReport(array $params): array|string
    {
        return $this->makeGateWay($this->model, 'generateReport', $params)
            ->send();
    }
}
