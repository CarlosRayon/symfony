<?php

namespace App\DataFixtures;

use App\Entity\User;

class DataProvider
{

    const USERS_DATA = [

        'admin' => [
            'name' => 'Toad',
            'surname' => 'Bros',
            'phone' => '666666666',
            'email' => 'tbros@alares.es',
            'password' => 'toad',
            'roles' => [User::ADMIN]
        ],
        'commercial-one' => [
            'name' => 'Mario',
            'surname' => 'Bros',
            'phone' => '666666666',
            'email' => 'mbros@alares.es',
            'password' => 'mario',
            'roles' => [User::COMMERCIAL]
        ],
        'commercial-two' => [
            'name' => 'Luigi',
            'surname' => 'Bros',
            'phone' => '666666666',
            'email' => 'lbros@alares.es',
            'password' => 'luigi',
            'roles' => [User::COMMERCIAL]
        ],
        'projectManager' => [
            'name' => 'Carlos',
            'surname' => 'Bros',
            'phone' => '666666666',
            'email' => 'crayon@alares.es',
            'password' => 'carlos',
            'roles' => [User::PROJECT_MANAGER]
        ],
        'technician-one' => [
            'name' => 'Browser',
            'surname' => 'Bros',
            'phone' => '666666666',
            'email' => 'bbros@alares.es',
            'password' => 'browser',
            'roles' => [User::TECHNICIAN]
        ],
        'technician-two' => [
            'name' => 'Wario',
            'surname' => 'Bros',
            'phone' => '666666666',
            'email' => 'wbros@alares.es',
            'password' => 'wario',
            'roles' => [User::TECHNICIAN]
        ],
        'customer' => [
            'name' => 'Peach',
            'surname' => 'Bros',
            'phone' => '666666666',
            'email' => 'pbros@alares.es',
            'password' => 'peach',
            'roles' => [User::CUSTOMER]
        ],

    ];

    const PRODUCT_DATA = [
        'web' => [
            'name' => 'Web',
            'description' => 'Pagina web simple',
            'price' => 100,
            'status' => 1,

            'characteristics' => [
                'web_ch_1' => [
                    'name' => 'Responsiva',
                    'description' => 'Web responsiva',
                    'price' => 50,
                    'status' => 1,
                ],
                'web_ch_2' => [
                    'name' => 'Multilengua',
                    'description' => 'Web con multi-idioma',
                    'price' => 50,
                    'status' => 1
                ],
                'web_ch_3' => [
                    'name' => 'Blog',
                    'description' => 'Web con blog',
                    'price' => 50,
                    'status' => 1
                ]
            ]
        ],
        'ecommerce' => [
            'name' => 'Eccomerce',
            'description' => 'Pagina web ecommerce',
            'price' => 200,
            'status' => 1,
            'characteristics' => [
                'ecommerce_ch_1' => [
                    'name' => 'Multilengua',
                    'description' => 'Ecommerce con multi-idioma',
                    'price' => 50,
                    'status' => 1
                ],
                'ecommerce_ch_2' => [
                    'name' => 'Chat',
                    'description' => 'Ecommerce con chat',
                    'price' => 50,
                    'status' => 1
                ],
                'ecommerce_ch_3' => [
                    'name' => 'Blog',
                    'description' => 'Ecommerce con blog',
                    'price' => 50,
                    'status' => 1
                ]
            ]
        ],
        'movil' => [
            'name' => 'Movil',
            'description' => 'Aplicación movil',
            'price' => 300,
            'status' => 1,
            'characteristics' => [
                'movil_ch_1' => [
                    'name' => 'Android',
                    'description' => 'Aplicación tipo android',
                    'price' => 50,
                    'status' => 1
                ],
                'movil_ch_2' => [
                    'name' => 'IOS',
                    'description' => 'Aplicación tipo IOS',
                    'price' => 50,
                    'status' => 1
                ],
            ]
        ]
    ];

    const PRODUCT_CHARACTERISTICS_DATA = [

        'web' => [
            'web_ch_1' => [
                'name' => 'Responsiva',
                'description' => 'Web responsiva',
                'price' => 50,
                'status' => 1,
            ],
            'web_ch_2' => [
                'name' => 'Multilengua',
                'description' => 'Web con multi-idioma',
                'price' => 50,
                'status' => 1
            ],
            'web_ch_3' => [
                'name' => 'Blog',
                'description' => 'Web con blog',
                'price' => 50,
                'status' => 1
            ]
        ],

        'ecommerce' => [
            'ecommerce_ch_1' => [
                'name' => 'Multilengua',
                'description' => 'Ecommerce con multi-idioma',
                'price' => 50,
                'status' => 1
            ],
            'ecommerce_ch_2' => [
                'name' => 'Chat',
                'description' => 'Ecommerce con chat',
                'price' => 50,
                'status' => 1
            ],
            'ecommerce_ch_3' => [
                'name' => 'Blog',
                'description' => 'Ecommerce con blog',
                'price' => 50,
                'status' => 1
            ]
        ],

        'movil' => [
            'movil_ch_1' => [
                'name' => 'Android',
                'description' => 'Aplicación tipo android',
                'price' => 50,
                'status' => 1
            ],
            'movil_ch_2' => [
                'name' => 'IOS',
                'description' => 'Aplicación tipo IOS',
                'price' => 50,
                'status' => 1
            ],
        ]
    ];
}
