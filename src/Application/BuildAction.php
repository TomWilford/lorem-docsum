<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Application;

use Faker\Generator;
use TomWilford\LoremDocsum\Domain\FileOutputType;
use TomWilford\LoremDocsum\Domain\State;
use TomWilford\LoremDocsum\Infrastructure\FileOutputStrategy\Interface\FileOutputStrategy;
use TomWilford\LoremDocsum\Infrastructure\FileOutputStrategy\Factory\FileOutputStrategyFactory;
use TomWilford\LoremDocsum\Infrastructure\Responder\Interface\Responder;

class BuildAction
{
    private State $state = State::IDLE;
    private FileOutputStrategy $outputStrategy;

    public function __construct(
        private readonly Responder $responder,
        private readonly Generator $faker,
        private readonly FileOutputStrategyFactory $fileOutputTypeFactory,
        private string $targetDirectory = '',
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
        $outputName = $this->targetDirectory
            // @phpstan-ignore cast.string
            . (string)$this->faker->words(rand(1, 3), true)
            . $outputType->extension();
        $this->responder->respond(sprintf('Writing %s', $outputName));

        $this->outputStrategy = $this->fileOutputTypeFactory->create($outputType);
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
