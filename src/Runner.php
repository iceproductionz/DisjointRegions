<?php
namespace Iceproductionz\DisjointRegions;

use Iceproductionz\DisjointRegions\Model\Region\Collection;
use Iceproductionz\DisjointRegions\Model\Region\Region;

class Runner
{
    /**
     * @var Collection
     */
    private $existing;

    /**
     * @var array
     */
    private $testData;

    /**
     * Runner constructor.
     * @param Collection $existing
     * @param array $testData
     */
    public function __construct(Collection $existing, array $testData)
    {
        $this->existing = $existing;
        $this->testData = $testData;
    }

    /**
     * Get all Test Data
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->existing;
    }

    /**
     * Create Regions
     */
    public function createRegions()
    {
        foreach ($this->testData as $rowPos => $row) {
            foreach ($row as $colPos => $col) {
                /**
                 * Define New Region
                 */
                if ($col === 1 && !$this->existing->regionExists($rowPos, $colPos)) {
                    $region = new Region();
                    $this->existing->addRegion($this->createRegion($region, $rowPos, $colPos));
                }
            }
        }
    }

    /**
     * Create new region
     *
     * @param Region $region
     * @param int $row
     * @param int $col
     * @return Region
     */
    public function createRegion(Region $region, int $row, int $col): Region
    {
        if (isset($this->testData[$row][$col]) && $this->testData[$row][$col] === 1 && $region->has($row, $col) === false) {
            $region->add($row, $col);
        }

        $this->moveUp($region, $row, $col);
        $this->moveDown($region, $row, $col);
        $this->moveLeft($region, $row, $col);
        $this->moveRight($region, $row, $col);

        return $region;
    }

    /**
     * Move Up
     *
     * @param Region $region
     * @param int $row
     * @param int $col
     */
    public function moveUp(Region $region, int $row, int $col)
    {
        $up = $row - 1;

        if (!isset($this->testData[$up][$col])) {
            return ;
        }

        if ($this->testData[$up][$col] === 0) {
            return ;
        }

        if ($region->has($up, $col) === true) {
            return ;
        }

        $this->createRegion($region, $up, $col);
    }

    /**
     * Move Down
     *
     * @param Region $region
     * @param int $row
     * @param int $col
     */
    public function moveDown(Region $region, int $row, int $col)
    {
        $bottom = $row + 1;

        if (!isset($this->testData[$bottom][$col])) {
            return ;
        }

        if ($this->testData[$bottom][$col] === 0) {
            return ;
        }

        if ($region->has($bottom, $col) === true) {
            return ;
        }

        $this->createRegion($region, $bottom, $col);
    }

    /**
     * Move Left
     *
     * @param Region $region
     * @param int $row
     * @param int $col
     */
    public function moveLeft(Region $region, int $row, int $col)
    {
        $left = $col - 1;

        if (!isset($this->testData[$row][$left])) {
            return ;
        }

        if ($this->testData[$row][$left] === 0) {
            return ;
        }

        if ($region->has($row, $left) === true) {
            return ;
        }

        $this->createRegion($region, $row, $left);
    }

    /**
     * Move Right
     *
     * @param Region $region
     * @param int $row
     * @param int $col
     */
    public function moveRight(Region $region, int $row, int $col)
    {
        $right = $col + 1;

        if (!isset($this->testData[$row][$right])) {
            return ;
        }

        if ($this->testData[$row][$right] === 0) {
            return ;
        }

        if ($region->has($row, $right) === true) {
            return ;
        }

        $this->createRegion($region, $row, $right);
    }
}
