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
     * TODO Simplify workflows.
     *
     * Create new region
     *
     * @param Region $region
     * @param int $row
     * @param int $col
     * @return Region
     */
    public function createRegion(Region $region, int $row, int $col): Region
    {

        $top    = $row - 1;
        $bottom = $row + 1;
        $left   = $col - 1;
        $right  = $col + 1;

        if (isset($this->testData[$row][$col]) && $this->testData[$row][$col] === 1 && $region->has($row, $col) === false) {
            $region->add($row, $col);
        }

        if (isset($this->testData[$top][$col]) && $this->testData[$top][$col] === 1 && $region->has($top, $col) === false) {
            $this->createRegion($region, $top, $col);
        }

        if (isset($this->testData[$bottom][$col]) && $this->testData[$bottom][$col] === 1 && $region->has($bottom, $col) === false) {
            $this->createRegion($region, $bottom, $col);

        }
        if (isset($this->testData[$row][$left]) && $this->testData[$row][$left] === 1 && $region->has($row, $left) === false) {
            $this->createRegion($region, $row, $left);
        }

        if (isset($this->testData[$row][$right]) && $this->testData[$row][$right] === 1 && $region->has($row, $right) === false) {
            $this->createRegion($region, $row, $right);
        }

        return $region;
    }
}