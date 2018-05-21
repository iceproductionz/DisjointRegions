<?php

namespace Iceproductionz\DisjointRegions\Model\Region;

/**
 * Class Region
 *
 * @package Iceproductionz\DisjointRegions\Model\Region
 */
class Region
{

    /**
     * @var array
     */
    private $regions = [[]];

    /**
     * Add new position to region
     *
     * @param int $row
     * @param int $col
     */
    public function add(int $row, int $col)
    {
        $this->regions[$row][$col] = true;
    }

    /**
     * Check if position is already a region
     *
     * @param int $row
     * @param int $col
     * @return bool
     */
    public function has(int $row, int $col): bool
    {
        return isset($this->regions[$row][$col]);
    }
}