<?php

namespace LisDev\Models;

use LisDev\Exceptions\BadRequestException;
use LisDev\Models\Traits\EditTrait;

class CounterParty extends NewPostApiBaseModel
{
    use EditTrait;

    protected string $model = 'CounterParty';

    /**
     * @param string $counterpartyProperty
     * @param int|null $page
     * @param string|null $findByString
     * @param string|null $cityRef
     * @return array|string
     * @throws BadRequestException
     */
    public function getCounterparties(
        string $counterpartyProperty = 'Recipient',
        ?int $page = null,
        ?string $findByString = null,
        ?string $cityRef = null
    ): array|string {
        $params = [];

        $params['CounterpartyProperty'] = $counterpartyProperty ?: 'Recipient';

        if (isset($page)) {
            $params['Page'] = $page;
        }

        if (isset($findByString)) {
            $params['FindByString'] = $findByString;
        }

        if (isset($cityRef)) {
            $params['City'] = $cityRef;
        }

        return $this->makeGateWay($this->model, 'getCounterparties', $params)
            ->send();
    }

    /**
     * @param string $cityRef
     * @return array|string
     * @throws BadRequestException
     */
    public function cloneLoyaltyCounterpartySender(string $cityRef): array|string
    {
        return $this->makeGateWay($this->model, 'cloneLoyaltyCounterpartySender', [
            'CityRef' => $cityRef
        ])->send();
    }

    /**
     * @param string $ref
     * @return array|string
     * @throws BadRequestException
     */
    public function getCounterpartyContactPersons(string $ref): array|string
    {
        return $this->makeGateWay($this->model, 'getCounterpartyContactPersons', [
            'Ref' => $ref
        ])->send();
    }

    /**
     * @param string $ref
     * @param int $page
     * @return array|string
     * @throws BadRequestException
     */
    public function getCounterpartyAddresses(string $ref, int $page = 0): array|string
    {
        return $this->makeGateWay($this->model, 'getCounterpartyAddresses', [
            'Ref' => $ref,
            'Page' => $page
        ])->send();
    }

    /**
     * @param string $ref
     * @return array|string
     * @throws BadRequestException
     */
    public function getCounterpartyOptions(string $ref): array|string
    {
        return $this->makeGateWay($this->model, 'getCounterpartyOptions', [
            'Ref' => $ref
        ])->send();
    }

    /**
     * @param string $edrpou
     * @param string $cityRef
     * @return array|string
     * @throws BadRequestException
     */
    public function getCounterpartyByEDRPOU(string $edrpou, string $cityRef): array|string
    {
        return $this->makeGateWay($this->model, 'getCounterpartyByEDRPOU', [
            'EDRPOU' => $edrpou,
            'cityRef' => $cityRef
        ])->send();
    }
}
