<?php

use Faker\Factory;
use TomWilford\LoremDocsum\Application\BuildAction;
use TomWilford\LoremDocsum\Domain\FileOutputType;
use TomWilford\LoremDocsum\Domain\LargeTextProvider;
use TomWilford\LoremDocsum\Infrastructure\ChunkEstimator\Factory\ChunkEstimatorFactory;
use TomWilford\LoremDocsum\Infrastructure\ContentProvider\Concrete\FakerContentProvider;
use TomWilford\LoremDocsum\Infrastructure\FileOutputStrategy\Factory\FileOutputStrategyFactory;
use TomWilford\LoremDocsum\Infrastructure\Responder\Concrete\TerminalResponder;

include dirname(__DIR__ ) . '/vendor/autoload.php';

$shortOptions = 's:'; // Size
$shortOptions .= 't:'; // type
$longOptions = [
    'size::',
    'type::'
];

$responder = new TerminalResponder();

if ($argc === 1) {
    $responder->respond(<<<OUT
    Lorem Docsum - Generate lorem ipsum files
    -------------------------------------------------
    -s (--size) = Size of file (MB) - required
    -t (--type) = Type of file to output [txt,docx]
    OUT);

    exit;
} else {
    $options = getopt($shortOptions, $longOptions);
    $size = $options['s'] ?? $options['size'] ?? null;
    $type = $options['t'] ?? $options['type'] ?? 'txt';

    if (empty($size)) {
        $responder->respond('Size is required in MB');
    }
    $size = (int) ($size * 1024 * 1024);

    $type = FileOutputType::tryFrom($type);
    if (empty($type)) {
        $responder->respond('Type not recognised. Defaulting to txt.');
        $type = FileOutputType::TXT;
    }

    $faker = Factory::create();
    $faker->addProvider(new LargeTextProvider($faker));
    $contentProvider = new FakerContentProvider($faker);
    $chunkEstimatorFactory = new ChunkEstimatorFactory();
    $fileOutputTypeFactory = new FileOutputStrategyFactory($contentProvider, $chunkEstimatorFactory);

    $app = new BuildAction(
        responder: $responder,
        faker: $faker,
        fileOutputTypeFactory: $fileOutputTypeFactory
    );

    $app->run($size, $type);
}



