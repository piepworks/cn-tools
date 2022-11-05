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

        'aps-ch' => [
            'name' => 'APS-C/H',
            'presets' => [
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
            'presets' => [
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

        'm43-half' => [
            'name' => 'M4/3 and Half-Frame',
            'presets' => [
                'm43' => [
                    'name' => 'Micro Four-Thirds',
                    'dimensions' => [
                        'width' => 18,
                        'height' => 13.5,
                    ],
                ],

                'half' => [
                    'name' => 'Half Frame',
                    'dimensions' => [
                        'width' => 24,
                        'height' => 18,
                    ],
                ],
            ]
        ],

        'panoramic' => [
            'name' => 'Panoramic',
            'presets' => [
                'hasselblad-xpan' => [
                    'name' => 'Hasselblad XPan / Fuji TX-1',
                    'dimensions' => [
                        'width' => 65,
                        'height' => 24,
                    ],
                ],
            ],
        ],

        'mf' => [
            'name' => 'Medium Format',
            'presets' => [
                '645' => [
                    'name' => '6×4.5',
                    'dimensions' => [
                        'width' => 60,
                        'height' => 45,
                    ],
                ],

                '66' => [
                    'name' => '6×6',
                    'dimensions' => [
                        'width' => 60,
                        'height' => 60,
                    ],
                ],

                '67' => [
                    'name' => '6×7',
                    'dimensions' => [
                        'width' => 70,
                        'height' => 60,
                    ],
                ],

                '68' => [
                    'name' => '6×8',
                    'dimensions' => [
                        'width' => 80,
                        'height' => 60,
                    ],
                ],

                '69' => [
                    'name' => '6×9',
                    'dimensions' => [
                        'width' => 90,
                        'height' => 60,
                    ],
                ],
            ],
        ],

        'lf' => [
            'name' => 'Large Format',
            'presets' => [
                '45' => [
                    'name' => '4×5',
                    'dimensions' => [
                        'width' => 127,
                        'height' => 101.6,
                    ],
                ],

                '810' => [
                    'name' => '8×10',
                    'dimensions' => [
                        'width' => 254,
                        'height' => 203.2,
                    ],
                ],
            ],
        ],

        'instant' => [
            'name' => 'Instant',
            'presets' => [
                'polaroid' => [
                    'name' => 'Polaroid',
                    'dimensions' => [
                        // https://support.polaroid.com/hc/en-us/articles/115012363647-Polaroid-Originals-Photo-Dimensions
                        'width' => 78.94,
                        'height' => 76.801,
                    ],
                ],

                'polaroid-spectra' => [
                    'name' => 'Polaroid Spectra',
                    'dimensions' => [
                        'width' => 90.78,
                        'height' => 73.41,
                    ],
                ],

                'instax-mini' => [
                    'name' => 'Instax Mini',
                    'dimensions' => [
                        'width' => 46,
                        'height' => 62,
                    ],
                ],

                'instax-wide' => [
                    'name' => 'Instax Wide',
                    'dimensions' => [
                        'width' => 99,
                        'height' => 62,
                    ],
                ],

                'instax-square' => [
                    'name' => 'Instax Square',
                    'dimensions' => [
                        'width' => 62,
                        'height' => 62,
                    ],
                ],

                'packfilm-100' => [
                    'name' => 'Type 100 Packfilm (FP-100C)',
                    'dimensions' => [
                        'width' => 95,
                        'height' => 73,
                    ],
                ],
            ],
        ],
    ],
];
