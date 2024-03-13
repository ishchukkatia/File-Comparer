<?php

namespace KateMatsenko\Entities;

class RawCompare
{
    private int $rawId;
    private string $compareSymbol;
    private string $compareText;

    public function __construct(int $rawId, string $firstRaw, string $secondRaw)
    {
        $this->rawId = $rawId;
        $this->compareRaws($firstRaw, $secondRaw);
    }
    public function getRawId(): int
    {
        return $this->rawId;
    }

    public function getCompareSymbol(): string
    {
        return $this->compareSymbol;
    }

    public function getCompareText(): string
    {
        return $this->compareText;
    }

    private function compareRaws(string $firstRaw, string $secondRaw): void
    {
        if ($firstRaw === $secondRaw) {
            $this->compareSymbol = ' ';
            $this->compareText = $firstRaw;

            return;
        }

        if (empty($firstRaw)) {
            $this->compareSymbol = '+';
            $this->compareText = $secondRaw;

            return;
        }

        if (empty($secondRaw)) {
            $this->compareSymbol = '-';
            $this->compareText = $firstRaw;

            return;
        }

        $this->compareSymbol = '*';
        $this->compareText = $firstRaw . '|' . $secondRaw;
    }
}