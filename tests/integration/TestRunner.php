<?php

namespace Iceproductionz\DisjointRegions\Integration;

use Iceproductionz\DisjointRegions\Model\Region\Collection;
use Iceproductionz\DisjointRegions\Runner;
use PHPUnit\Framework\TestCase;

/**
 * Class TestRunner
 *
 * @package Iceproductionz\DisjointRegions\Integration
 */
class TestRunner extends TestCase
{
    /**
     * Provide Test Data.
     *
     * @return array
     */
    public function provideValues()
    {
        return [
            [
                'test' =>
                    [
                        [1,1,0,1],
                        [1,0,0,1],
                        [0,1,0,0],
                        [0,0,0,0]
                    ],
                'count' => 3
            ],
            [
                'test' =>
                    [
                        [1,0,0,1],
                        [1,0,1,1],
                        [1,0,0,1],
                        [1,1,0,0]
                    ],
                'count' => 2
            ],
            [
                'test' =>
                    [
                        [1,0,0,1],
                        [1,0,0,1],
                        [1,0,0,1],
                        [1,1,1,1]
                    ],
                'count' => 1
            ],
            [
                'test'=>
                    [
                        [1,0,1,0],
                        [1,1,0,1],
                        [0,0,1,0],
                        [1,0,1,0]
                    ],
                'count' => 5
            ]
        ];
    }

    /**
     * Test Sample Data
     *
     * @dataProvider  provideValues
     *
     * @param $testData
     * @param $regions
     */
    public function testRegionFound($testData, $regions)
    {
        $runner = new Runner(new Collection([]), $testData);
        $runner->createRegions();
        $count = $runner->getAll()->count();

        $this->assertSame($count, $regions);
    }
}
