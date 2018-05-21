<?php

namespace Iceproductionz\DisjointRegions\Unit\Model\Region;

use Iceproductionz\DisjointRegions\Model\Region\Collection;
use Iceproductionz\DisjointRegions\Model\Region\Region;
use PHPUnit\Framework\TestCase;

/**
 * Class TestCollection
 *
 * @package Iceproductionz\DisjointRegions\Unit\Model\Region
 */
class TestCollection extends TestCase
{
    /**
     * Test Construction
     */
    public function testConstruction()
    {
        $sut = new Collection([]);

        $this->assertInstanceOf(Collection::class, $sut);
    }

    /**
     *  Test Add Region
     */
    public function testAddRegin()
    {
        $region= new Region();

        $sut = new Collection([]);

        $sut->addRegion($region);

        $this->assertSame($region, $sut->getRegions()[0]);
    }

    /**
     *  Test Add Region
     */
    public function testRegionExists()
    {
        $region= new Region();
        $region->add(1,1);

        $sut = new Collection([]);

        $sut->addRegion($region);

        $this->assertTrue($sut->regionExists(1, 1));
        $this->assertFalse($sut->regionExists(1, 2));
    }


}