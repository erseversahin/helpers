### Recursive Array Filter

*Verilen parametreler doğrultusunda çok boyutlu dizilerde filtre uygular.*

*Kullanımı:*

````php
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


$newArray = filter($array);

print_r($newArray);
````
*Sonuç:*

```php 
Array
(
    [isim] => Şahin
    [soyisim] => &lt;i&gt;ERSEVER&lt;/i&gt;
    [yabanci_dil] => Array
        (
            [tr] => Türkçe
            [en] => &lt;bold&gt;English&lt;/bold&gt;
        )

    [yazilim_dilleri] => Array
        (
            [0] => Array
                (
                    [php] => Array
                        (
                            [0] => codeigniter
                            [1] => laravel
                            [2] => symfony
                        )

                    [javascript] => Array
                        (
                            [0] => vuejs
                            [react] => Array
                                (
                                    [0] => react
                                    [1] => &lt;bold&gt;react-native&lt;/bold&gt;
                                )

                        )

                )

        )

)
```