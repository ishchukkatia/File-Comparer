<?php

use KateMatsenko\Services\FileComparer;

require 'vendor/autoload.php';

try {
    $rawCompares = FileComparer::compareFilesRaws('files/first.txt', 'files/second.txt');

    foreach ($rawCompares as $rawCompare) {
        echo $rawCompare->getRawId() . ' ' . $rawCompare->getCompareSymbol() . ' ' . $rawCompare->getCompareText() . "\n";
    }

} catch (Exception $e) {
    echo  $e->getMessage() . "\n";
}

