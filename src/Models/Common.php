<?php

namespace LisDev\Models;

use LisDev\Exceptions\BadRequestException;
use LisDev\Exceptions\UnprocessableModelMethodException;

/**
 * @method array|string getTypesOfCounterparties()
 * @method array|string getBackwardDeliveryCargoTypes()
 * @method array|string getCargoDescriptionList()
 * @method array|string getCargoTypes()
 * @method array|string getDocumentStatuses()
 * @method array|string getOwnershipFormsList()
 * @method array|string getPalletsList()
 * @method array|string getPaymentForms()
 * @method array|string getTimeIntervals()
 * @method array|string getServiceTypes()
 * @method array|string getTiresWheelsList()
 * @method array|string getTraysList()
 * @method array|string getTypesOfAlternativePayers()
 * @method array|string getTypesOfPayers()
 * @method array|string getTypesOfPayersForRedelivery()
 */
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
