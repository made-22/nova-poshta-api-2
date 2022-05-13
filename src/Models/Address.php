<?php

namespace LisDev\Models;

use LisDev\Exceptions\BadRequestException;

class Address extends NewPostApiBaseModel
{
    protected string $model = 'Address';

    /**
     * @param string $ref
     * @param string $findByString
     * @param int $page
     * @return array|string
     * @throws BadRequestException
     */
    public function getCities(string $ref = '', string $findByString = '', int $page = 0): array|string
    {
        return $this->makeGateWay($this->model, 'getCities', [
            'Page' => $page,
            'FindByString' => $findByString,
            'Ref' => $ref,
        ])->send();
    }

    /**
     * @param string $cityRef
     * @param int $page
     * @return array|string
     * @throws BadRequestException
     */
    public function getWarehouses(string $cityRef, int $page = 0): array|string
    {
        return $this->makeGateWay($this->model, 'getWarehouses', [
            'CityRef' => $cityRef,
            'Page' => $page,
        ])->send();
    }

    /**
     * @param array $searchStringArray
     * @return array|string
     * @throws BadRequestException
     */
    public function findNearestWarehouse(array $searchStringArray): array|string
    {
        return $this->makeGateWay($this->model, 'findNearestWarehouse', [
            'SearchStringArray' => $searchStringArray,
        ])->send();
    }

    /**
     * @param string $cityRef
     * @param string $findByString
     * @param int $page
     * @return array|string
     * @throws BadRequestException
     */
    public function getStreet(string $cityRef, string $findByString = '', int $page = 0): array|string
    {
        return $this->makeGateWay($this->model, 'getStreet', [
            'FindByString' => $findByString,
            'CityRef' => $cityRef,
            'Page' => $page,
        ])->send();
    }

    /**
     * @param string $ref
     * @param int $page
     * @return array|string
     * @throws BadRequestException
     */
    public function getAreas(string $ref = '', int $page = 0): array|string
    {
        return $this->makeGateWay($this->model, 'getAreas', [
            'Ref' => $ref,
            'Page' => $page,
        ])->send();
    }
}
