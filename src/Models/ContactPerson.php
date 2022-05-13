<?php

namespace LisDev\Models;

use LisDev\Models\Traits\EditTrait;

class ContactPerson extends NewPostApiBaseModel
{
    use EditTrait;

    protected string $model = 'ContactPerson';
}
