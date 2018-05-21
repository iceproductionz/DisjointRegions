<?php

namespace Iceproductionz\DisjointRegions\Model\Region;

/**
 * Class Collection
 *
 * @package Iceproductionz\DisjointRegions\Model\Region
 */
class Collection implements \Countable
{
    /**
     * @var array
     */
    private $list;

    /**
     * Collection constructor.
     *
     * @param Region[] $list
     */
    public function __construct(array $list)
    {
        $this->list = $list;
    }

    /**
     * Regions
     *
     * @param Region $region
     */
    public function addRegion(Region $region)
    {
        $this->list[] = $region;
    }

    /**
     * @return Region[]
     */
    public function getRegions(): array
    {
        return $this->list;
    }

    /**
     * Does Region exists
     *
     * @param int $row
     * @param int $col
     * @return bool
     */
    public function regionExists(int $row, int $col): bool
    {
        foreach ($this->list as $region) {
            if ($region->has($row, $col)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return \count($this->list);
    }
}