<?php

function filter($array, bool $htmlspecialchars = true, bool $trim = true)
{
    if (is_array($array)):
        return array_map('filter', $array);
    else:
        if ($trim === true) $array = trim($array);
        if ($htmlspecialchars === true) $array = htmlspecialchars($array);
        return $array;
    endif;
}


$array = [
    'isim' => 'Şahin',
    'soyisim' => '<i>ERSEVER</i>',
    'yabanci_dil' => [
        'tr' => 'Türkçe',
        'en' => '<bold>English</bold>'
    ],
    'yazilim_dilleri' => [
        [
            'php' => [
                'codeigniter',
                'laravel',
                'symfony'
            ],
            'javascript' => [
                'vuejs',
                'react' => [
                    'react',
                    '<bold>react-native</bold>'
                ]
            ]
        ]
    ]
];


print_r(filter($array));