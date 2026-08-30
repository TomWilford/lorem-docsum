<?php

namespace TomWilford\LoremDocsum\Application;

use Faker\Factory;
use Faker\Generator;
use TomWilford\LoremDocsum\Domain\FileOutputType;
use TomWilford\LoremDocsum\Domain\State;
use TomWilford\LoremDocsum\Infrastructure\ContentProvider\ContentProvider;
use TomWilford\LoremDocsum\Infrastructure\ContentProvider\FakerContentProvider;
use TomWilford\LoremDocsum\Infrastructure\FileOutput\FileOutputStrategy;
use TomWilford\LoremDocsum\Infrastructure\Responder\Responder;

class BuildAction
{
    private State $state = State::IDLE;
    private FileOutputStrategy $outputStrategy;

    public function __construct(
        private readonly Responder $responder,
        private readonly Generator $faker,
        private readonly ContentProvider $contentProvider
    ) {
    }

    public function run(int $targetBytes, FileOutputType $fileType): void
    {
        $this->responder->respond('Starting lorem docsum');

        while ($this->state !== State::COMPLETE) {
            $this->state = match ($this->state) {
                State::IDLE => $this->init($targetBytes, $fileType),
                State::WRITING => $this->writeContent(),
                State::CHECKING => $this->hasSizeMetTarget(),
            };
        }

        $this->responder->respond('Lorem docs done');
    }

    private function init(int $targetBytes, FileOutputType $outputType): State
    {
        $outputName = $this->faker->words(rand(1, 3), true) . $outputType->extension();
        $this->responder->respond(sprintf('Writing %s', $outputName));

        $this->outputStrategy = $outputType->getOutputStrategy($this->contentProvider);
        $this->outputStrategy->init(
            outputName: $outputName,
            targetBytes: $targetBytes
        );

        return State::WRITING;
    }

    private function writeContent(): State
    {
        $this->outputStrategy->write();

        return State::CHECKING;
    }

    private function hasSizeMetTarget(): State
    {
        if ($this->outputStrategy->check()) {
            return State::COMPLETE;
        }

        return State::WRITING;
    }
}
