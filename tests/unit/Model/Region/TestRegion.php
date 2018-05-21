<?php

namespace Iceproductionz\DisjointRegions\Unit\Model\Region;

use Iceproductionz\DisjointRegions\Model\Region\Region;
use PHPUnit\Framework\TestCase;

class TestRegion extends TestCase
{
    /***
     *  Test Construction
     */
    public function testConstruction()
    {
        $sut = new Region();

        $this->assertInstanceOf(Region::class, $sut);
    }

    /**
     *  Test Add and Has Region
     */
    public function testAddAndHas()
    {
        $sut = new Region();

        $this->assertFalse($sut->has(0,1));

        $sut->add(0,1);

        $this->assertTrue($sut->has(0,1));
    }

}
