<?php

namespace KateMatsenko\Services;

use KateMatsenko\Entities\File;
use KateMatsenko\Entities\RawCompare;
use KateMatsenko\Exceptions\FileNotFoundException;
use KateMatsenko\Exceptions\IncorrectFileExtensionException;

class FileComparer
{
    /**
     * @param string $firstFilePath
     * @param string $secondFilePath
     * @return array<RawCompare>
     * @throws FileNotFoundException
     * @throws IncorrectFileExtensionException
     */
    public static function compareFilesRaws(string $firstFilePath, string $secondFilePath): array
    {
        $firstFile = new File($firstFilePath);
        $secondFile = new File($secondFilePath);

        $maxRawsCount = max([$firstFile->getRawsCount(), $secondFile->getRawsCount()]);

        $rawCompares = [];
        for ($index = 0; $index < $maxRawsCount; $index++) {
            $rawCompares[] = new RawCompare(
                rawId: $index + 1,
                firstRaw: trim($firstFile->getRaw($index)),
                secondRaw: trim($secondFile->getRaw($index))
            );
        }

        return $rawCompares;
    }
}