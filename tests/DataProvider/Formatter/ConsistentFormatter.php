<?php

namespace Darsyn\IP\Tests\DataProvider\Formatter;

class ConsistentFormatter
{
    public static function getValidBinarySequences()
    {
        return [
            [pack('H*', '00000000'), '0.0.0.0'                                            ],
            [pack('H*', '770e712c'), '119.14.113.44'                                      ],
            [pack('H*', '53c52449'), '83.197.36.73'                                       ],
            [pack('H*', '12763b28'), '18.118.59.40'                                       ],
            [pack('H*', '64274480'), '100.39.68.128'                                      ],
            [pack('H*', '44c06122'), '68.192.97.34'                                       ],
            [pack('H*', '8dd8074b'), '141.216.7.75'                                       ],
            [pack('H*', '97c530cd'), '151.197.48.205'                                     ],
            [pack('H*', 'b6eac58d'), '182.234.197.141'                                    ],
            [pack('H*', '00000000000000000000000000000000'), '::'                         ],
            [pack('H*', '00000000000000000000000000000001'), '::1'                        ],
            [pack('H*', '0000000000000000000000000b120cab'), '::b12:cab'                  ],
            [pack('H*', '0000000000000000000000000c22384e'), '::c22:384e'                 ],
            [pack('H*', '00000000000000000000ffff0c22384e'), '::ffff:c22:384e'            ],
            [pack('H*', '20020c22384e00000000000000000000'), '2002:c22:384e::'            ],
            [pack('H*', '20010db8000000000a608a2e03707334'), '2001:db8::a60:8a2e:370:7334'],
            [pack('H*', '20010db8000000000a608a2e00007334'), '2001:db8::a60:8a2e:0:7334'  ],
            [pack('H*', '20010db8000000000a608a2e03707334'), '2001:db8::a60:8a2e:370:7334'],
            [pack('H*', '00000000000000000000ffff00000000'), '::ffff:0:0'                 ],
        ];
    }

    public static function getInvalidBinarySequences()
    {
        return [
            ['123'],
            ['12345'],
            ['123456789012345'],
            ['12345678901234567'],
            ['This one is completely wrong.'],
            // 5 bytes instead of 4.
            [123],
            [1.3],
            [array()],
            [(object) array()],
            [null],
            [true],
        ];
    }
}
