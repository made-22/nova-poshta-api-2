<?php

namespace LisDev\Models\Traits;

use LisDev\Exceptions\BadRequestException;

trait EditTrait
{
    /**
     * @param array $params
     * @return array|string
     * @throws BadRequestException
     */
    public function delete(array $params): array|string
    {
        return $this->makeGateWay($this->model, 'delete', $params)
            ->send();
    }

    /**
     * @param array $params
     * @return array|string
     * @throws BadRequestException
     */
    public function update(array $params): array|string
    {
        return $this->makeGateWay($this->model, 'update', $params)
            ->send();
    }


    /**
     * @param array $params
     * @return array|string
     * @throws BadRequestException
     */
    public function save(array $params): array|string
    {
        return $this->makeGateWay($this->model, 'save', $params)
            ->send();
    }
}
