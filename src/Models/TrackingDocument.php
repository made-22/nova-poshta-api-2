<?php

namespace LisDev\Models;

use LisDev\Exceptions\BadRequestException;
use LisDev\Models\Traits\EditTrait;

class TrackingDocument extends NewPostApiBaseModel
{
    use EditTrait;

    protected string $model = 'TrackingDocument';

    /**
     * @param string $track
     * @return array|string
     * @throws BadRequestException
     */
    public function tracking(string $track): array|string
    {
        $params = [
            'Documents' => [
                [
                    'DocumentNumber' => $track
                ]
            ]
        ];

        return $this->makeGateWay($this->model, 'getStatusDocuments', $params)
            ->send();
    }
}
