
<?php

use Iceproductionz\DisjointRegions\Model\Region\Collection;
use Iceproductionz\DisjointRegions\Runner;

include __DIR__ . '/../src/Model/Region/Collection.php';
include __DIR__ . '/../src/Model/Region/Region.php';
include __DIR__ . '/../src/Runner.php';



$regionsTest = json_decode(file_get_contents(__DIR__ . '/../regions.json'), JSON_OBJECT_AS_ARRAY);

foreach ($regionsTest['regions'] as $no  => $testData) {
    echo 'Region ' . ($no + 1) . "\r\n";
    $runner = new Runner(new Collection([]), $testData);
    $runner->createRegions();
    echo  $runner->getAll()->count() . "\r\n";
}
