<?php

namespace KateMatsenko\Exceptions;

class IncorrectFileExtensionException extends \Exception
{
    public function __construct(string $filePath, array $availableExtension)
    {
        parent::__construct($filePath . ' has incorrect extension. Available extensions: ' . implode(', ', $availableExtension), 400);
    }

}