<?php

use funcraft\year\interfaces\IChecker as I;

return [
    I::PARAM_COLORS => [
        'red' => [
            I::PARAM_CHAIN     => 'orange',
            I::PARAM_VALIDATOR => new \funcraft\year\components\validators\RedValidator()
        ],
        'orange' => [
            I::PARAM_CHAIN     => 'yellow',
            I::PARAM_VALIDATOR => new \funcraft\year\components\validators\OrangeValidator()
        ],
        'yellow' => [
            I::PARAM_CHAIN     => 'green',
            I::PARAM_VALIDATOR => new \funcraft\year\components\validators\YellowValidator()
        ],
        'green' => [
            I::PARAM_CHAIN     => 'cyan',
            I::PARAM_VALIDATOR => new \funcraft\year\components\validators\GreenValidator()
        ],
        'cyan' => [
            I::PARAM_CHAIN     => 'blue',
            I::PARAM_VALIDATOR => new \funcraft\year\components\validators\CyanValidator()
        ],
        'blue' => [
            I::PARAM_CHAIN     => 'purple',
            I::PARAM_VALIDATOR => new \funcraft\year\components\validators\BlueValidator()
        ],
        'purple' => [
            I::PARAM_CHAIN     => I::CHAIN_NONE,
            I::PARAM_VALIDATOR => new \funcraft\year\components\validators\PurpleValidator()
        ],
        'grey' => [
            I::PARAM_CHAIN     => I::CHAIN_NONE,
            I::PARAM_VALIDATOR => new \funcraft\year\components\validators\GreenValidator()
        ]
    ],
    
    I::PARAM_DATA_DESC => [
        I::DATA_PARAM_TYPE  => I::DATA_TYPE_OBJECT,
        I::DATA_PARAM_DATE  => 'getCreateDate',
        I::DATA_PARAM_VALUE => 'getPages'
    ]
];