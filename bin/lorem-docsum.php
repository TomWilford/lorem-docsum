<?php

include dirname(__DIR__ ) . '/vendor/autoload.php';

$shortOptions = 's:'; // Size
$shortOptions .= 't:'; // type
$longOptions = [
    'size::',
    'type::'
];

if ($argc === 1) {
    print(<<<OUT
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


    $app = new \TomWilford\LoremDocsum\Application\Build();

    $app->execute($size, $type);
}



