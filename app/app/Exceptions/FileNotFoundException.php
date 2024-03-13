<?php

namespace KateMatsenko\Exceptions;

class FileNotFoundException extends \Exception
{
    public function __construct(string $filePath)
    {
        parent::__construct($filePath . ' file not found', 404);
    }

}