<?php

use Faker\Factory;
use TomWilford\LoremDocsum\Application\BuildAction;
use TomWilford\LoremDocsum\Domain\FileOutputType;
use TomWilford\LoremDocsum\Infrastructure\ContentProvider\FakerContentProvider;
use TomWilford\LoremDocsum\Infrastructure\Responder\TerminalResponder;

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
    $size = (int) $size * 1024 * 1024;

    $type = FileOutputType::tryFrom($type);
    if (empty($type)) {
        $responder->respond('Type not recognised. Defaulting to txt.');
        $type = FileOutputType::TXT;
    }

    $faker = Factory::create();
    $contentProvider = new FakerContentProvider($faker);

    $app = new BuildAction(
        responder: $responder,
        faker: $faker,
        contentProvider: $contentProvider
    );

    $app->run($size, $type);
}



