<?php

return [
    'presets' => [
        'full' => [
            'name' => 'Full Frame',
            'dimensions' => [
                'width' => 36,
                'height' => 24,
            ],
        ],

        // I guess if an item has 'items' in it,
        // then we can make it an <optgroup>.
        'aps-ch' => [
            'name' => 'APS-C/H',
            'items' => [
                'nikon-apsc' => [
                    'name' => 'Nikon DX',
                    'dimensions' => [
                        'width' => 23.5,
                        'height' => 15.7,
                    ],
                ],

                'canon-apsc' => [
                    'name' => 'Canon APS-C',
                    'dimensions' => [
                        'width' => 22.3,
                        'height' => 14.9,
                    ],
                ],

                'sony-apsc' => [
                    'name' => 'Sony APS-C / Ricoh GR',
                    'dimensions' => [
                        'width' => 23.5,
                        'height' => 15.6,
                    ],
                ],

                'fuji-apsc' => [
                    'name' => 'Fuji X-Trans',
                    'dimensions' => [
                        'width' => 23.6,
                        'height' => 15.6,
                    ],
                ],

                'apsh' => [
                    'name' => 'APS-H (Sigma)',
                    'dimensions' => [
                        'width' => 26.6,
                        'height' => 17.9,
                    ],
                ],
            ],
        ],

        'mf-digital' => [
            'name' => '“Medium Format” Digital',
            'items' => [
                'fuji-mf' => [
                    'name' => 'Fuji G Mount / Hasselblad X1D',
                    'dimensions' => [
                        'width' => 43.8,
                        'height' => 32.9,
                    ],
                ],

                'leica-mf' => [
                    'name' => 'Leica S-System',
                    'dimensions' => [
                        'width' => 45,
                        'height' => 30,
                    ],
                ],
            ],
        ],

        'half' => [
            'name' => 'Half Frame',
            'dimensions' => [
                'width' => 24,
                'height' => 18,
            ]
        ]
    ]
];
