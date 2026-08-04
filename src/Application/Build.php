<?php

namespace TomWilford\LoremDocsum\Application;

use TomWilford\LoremDocsum\Domain\Lipsum;
use TomWilford\LoremDocsum\Domain\OutputType;
use TomWilford\LoremDocsum\Domain\State;

class Build
{
    private State $state = State::IDLE;
    private string $content = '';

    public function execute(float $targetSize, ?string $fileType = null): void
    {
        $targetSize = $this->megabytesToBytes($targetSize);
        $fileType = OutputType::tryFrom($fileType) ?? OutputType::TXT;

        while ($this->state !== State::COMPLETE) {
            $this->state = match ($this->state) {
                State::IDLE => $this->resetContent(),
                State::WRITING => $this->writeBlock(),
                State::CHECKING => $this->hasSizeMetTarget($targetSize),
                State::TARGET_REACHED => $this->createFile($fileType),
            };
        }
    }

    public function megabytesToBytes(float $targetSize): float
    {
        return $targetSize * 1024 * 1024;
    }

    private function resetContent(): State
    {
        $this->content = '';

        return State::WRITING;
    }

    private function writeBlock(): State
    {
        $this->content .= (new Lipsum())->getFullText();

        return State::CHECKING;
    }

    private function hasSizeMetTarget(float $target): State
    {
        if (strlen($this->content) <= $target) {
            return State::WRITING;
        }

        return State::TARGET_REACHED;
    }

    private function createFile(OutputType $outputType): State
    {
        $outputType->exporter()->export($this->content);

        return State::COMPLETE;
    }
}
