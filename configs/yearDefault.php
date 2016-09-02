<?php

use funcraft\glyphicon\components\Glyphicon;

return [
    'red' => [
        'example' => 'red',
        'title'   => 'Красный',
        'desc'    => '<span title="Меньше 10 страниц">' . Glyphicon::renderIcon(Glyphicon::Lower) . '10</span>'
    ],
    'orange' => [
        'example' => 'orange',
        'title'   => 'Оранжевый',
        'desc'    => '<span title="Меньше 30 страниц">' . Glyphicon::renderIcon(Glyphicon::Lower) . '30</span>'
    ],
    'yellow' => [
        'example' => '#cccc33',
        'title'   => 'Жёлтый',
        'desc'    => '<span title="Меньше 40 страниц">' . Glyphicon::renderIcon(Glyphicon::Lower) . '40</span>'
    ],
    'green' => [
        'example' => 'green',
        'title'   => 'Зелёный',
        'desc'    => '<span title="Меньше 70 страниц">' . Glyphicon::renderIcon(Glyphicon::Lower) . '70</span>'
    ],
    'cyan' => [
        'example' => '#6699ff',
        'title'   => 'Голубой',
        'desc'    => '<span title="Меньше 110 страниц">' . Glyphicon::renderIcon(Glyphicon::Lower) . '110</span>'
    ],
    'blue' => [
        'example' => 'blue',
        'title'   => 'Синий',
        'desc'    => '<span title="Меньше 180 страниц">' . Glyphicon::renderIcon(Glyphicon::Lower) . '180</span>'
    ],

    'infinity' => [
        'example' => 'purple',
        'title'   => 'Фиолетовый',
        'desc'    => '<span title="Больше 180 страниц">' . Glyphicon::renderIcon(Glyphicon::Bigger) . '180</span>'
    ],
    'zero' => [
        'example' => 'grey',
        'title'   => 'Серый',
        'desc'    => '&nbsp;&nbsp;<span title="0 страниц">0</span>'
    ]
];