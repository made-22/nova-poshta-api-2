<?php

namespace LisDev\Models;

use LisDev\Exceptions\BadRequestException;
use LisDev\Exceptions\UnprocessableModelMethodException;

class Common extends NewPostApiBaseModel
{
    protected string $model = 'Common';

    /**
     * @param string $method
     * @param array $arguments
     * @return array|string
     * @throws BadRequestException
     * @throws UnprocessableModelMethodException
     */
    public function __call(string $method, array $arguments)
    {
        $commonModelMethods = [
            'getTypesOfCounterparties',
            'getBackwardDeliveryCargoTypes',
            'getCargoDescriptionList',
            'getCargoTypes',
            'getDocumentStatuses',
            'getOwnershipFormsList',
            'getPalletsList',
            'getPaymentForms',
            'getTimeIntervals',
            'getServiceTypes',
            'getTiresWheelsList',
            'getTraysList',
            'getTypesOfAlternativePayers',
            'getTypesOfPayers',
            'getTypesOfPayersForRedelivery',
        ];

        if (!in_array($method, $commonModelMethods)) {
            throw new UnprocessableModelMethodException(
                sprintf('Method %s unprocessable for model %s', $method, $this->model)
            );
        }

        return $this->makeGateWay($this->model, $method)->send();
    }
}
