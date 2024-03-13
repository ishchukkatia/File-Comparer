<?php

namespace KateMatsenko\Entities;

use KateMatsenko\Exceptions\FileNotFoundException;
use KateMatsenko\Exceptions\IncorrectFileExtensionException;

class File
{
    private const AVAILABLE_EXTENSIONS = [
        'txt'
    ];
    private array $raws;
    private int $rawsCount;
    
    /**
     * @param string $filePath
     * @throws FileNotFoundException
     * @throws IncorrectFileExtensionException
     */
    public function __construct(string $filePath)
    {
        $this->checkFileExist($filePath);
        $this->validateExtension($filePath);
        $this->raws = $this->getRawsFromContent($filePath);
        $this->rawsCount = count($this->raws);
    }

    public function getRawsCount(): int
    {
        return  $this->rawsCount;
    }

    public function getRaw(int $index): string
    {
        return $this->raws[$index] ?? '';
    }

    /**
     * @param string $filePath
     * @return void
     * @throws FileNotFoundException
     */
    private function checkFileExist(string $filePath): void
    {
        if (!file_exists($filePath)) {
            throw new FileNotFoundException($filePath);
        }
    }

    /**
     * @param string $filePath
     * @return void
     * @throws IncorrectFileExtensionException
     */
    private function validateExtension(string $filePath): void
    {
        $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        if (!in_array($extension, self::AVAILABLE_EXTENSIONS, true)) {
            throw new IncorrectFileExtensionException($filePath, self::AVAILABLE_EXTENSIONS);
        }
    }

    private function getRawsFromContent(string $filePath): array
    {
        return explode("\n", file_get_contents($filePath));
    }
}