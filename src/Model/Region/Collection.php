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
     * Add a regions to collection
     *
     * @param Region $region
     */
    public function addRegion(Region $region)
    {
        $this->list[] = $region;
    }

    /**
     * Get all Regions created
     *
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
     * Get number of regions recorded
     *
     * @return int
     */
    public function count(): int
    {
        return \count($this->list);
    }
}