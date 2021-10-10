<?php


function timeAgo ($time, $locale = 'tr', $getFullDiff = false){

    $locales = [
        'tr' => [
            'ago' => 'önce',
            'now' => 'az önce',
            'seconds' => 'saniye',
            'minutes' => 'dakika',
            'hours' => 'saat',
            'day' => 'gün',
            'week' => 'hafta',
            'month' => 'ay',
            'year' => 'yıl',
        ],
        'en' => [
            'ago' => 'ago',
            'now' => 'just now',
            'seconds' => 'second',
            'minutes' => 'minutes',
            'hours' => 'hours',
            'day' => 'day',
            'week' => 'hafta',
            'month' => 'month',
            'year' => 'year',
        ]
    ];

    $timeDiff = time() - strtotime($time);

    if ($getFullDiff == false){
        if( $timeDiff < 60 )
            if ($timeDiff <= 0) return $locales[$locale]['now'];
            else return $timeDiff .' '.$locales[$locale]['seconds'].' '.$locales[$locale]['ago'];
        else if ( round($timeDiff/60) < 60 ) return round($timeDiff/60) .' '.$locales[$locale]['minutes'].' '.$locales[$locale]['ago'];
        else if ( round($timeDiff/3600) < 24 ) return round($timeDiff/3600).' '.$locales[$locale]['hours'].' '.$locales[$locale]['ago'];
        else if ( round($timeDiff/86400) < 7 ) return round($timeDiff/86400) .' '.$locales[$locale]['day'].' '.$locales[$locale]['ago'];
        else if ( round($timeDiff/604800) < 4 ) return round($timeDiff/604800).' '.$locales[$locale]['week'].' '.$locales[$locale]['ago'];
        else if ( round($timeDiff/2419200) < 12 ) return round($timeDiff/2419200) .' '.$locales[$locale]['month'].' '.$locales[$locale]['ago'];
        else return round($timeDiff/29030400).' '.$locales[$locale]['year'].' '.$locales[$locale]['ago'];
    }else{

        $date = new DateTime($time);
        $now = new DateTime();
        $obj = $now->diff($date);

        $return = '';
        if ($obj->y > 0) $return .= ' '.$obj->y .' '. $locales[$locale]['year'];
        if ($obj->m > 0) $return .= ' '.$obj->m .' '. $locales[$locale]['month'];
        if ($obj->d > 0) $return .= ' '.$obj->d .' '. $locales[$locale]['day'];
        if ($obj->h > 0) $return .= ' '.$obj->h .' '. $locales[$locale]['hours'];
        if ($obj->i > 0) $return .= ' '.$obj->i .' '. $locales[$locale]['minutes'];
        if ($obj->s > 0) $return .= ' '.$obj->s .' '. $locales[$locale]['seconds'];

        return trim($return);
    }



}

$data = [
    'tr_full_diff' => timeAgo('2021-08-26 01:35:20','tr',true),
    'en_full_diff' => timeAgo('2021-08-26 01:35:20','en',true),
    'tr_short_diff' => timeAgo('2021-08-26 01:35:20'),
    'en_short_diff' => timeAgo('2021-08-26 01:35:20','en'),
];

echo "<pre>";
print_r($data);

