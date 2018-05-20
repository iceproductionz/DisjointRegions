<?php

namespace Iceproductionz\DisjointRegions\Unit;

use Iceproductionz\DisjointRegions\Model\Region\Collection;
use Iceproductionz\DisjointRegions\Runner;
use PHPUnit\Framework\TestCase;

class TestRunner extends TestCase
{
    /**
     *  Test Construction
     */
    public function testConstructions()
    {
        $collection = $this->mockCollection();
        $sut = new Runner($collection, []);

        $this->assertInstanceOf(Runner::class, $sut);

        return $sut;
    }

    public function testGetAll()
    {
        $collection = $this->mockCollection();
        $sut = new Runner($collection, []);

        $this->assertSame($collection, $sut->getAll());
    }

    /**
     * @return \PHPUnit\Framework\MockObject\MockObject|Collection
     */
    private function mockCollection()
    {
        return $this->createMock(Collection::class);
    }
}