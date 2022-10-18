<?php

use App\Enum\TypeEnum;
use App\Enum\StatusEnum;
 
return [
    'transection' => [
        'types' => TypeEnum::cases(),
        'statuses' => StatusEnum::cases(),
    ],
];