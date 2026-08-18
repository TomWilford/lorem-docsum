<?php

declare(strict_types=1);

namespace TomWilford\LoremDocsum\Domain;

use SplFileObject;

class Lipsum
{
    public string $lineOne = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquam eget erat quis fermentum. Morbi vulputate tortor a ex vulputate fringilla. Pellentesque convallis condimentum dignissim. Phasellus ultrices lorem vitae cursus commodo. Vestibulum consectetur viverra sem id pulvinar. Maecenas vel erat ac ipsum dignissim malesuada. In faucibus velit sit amet ex lobortis pellentesque. Aenean hendrerit tristique dui eget finibus. Suspendisse ultricies finibus nisl, non ornare neque ultrices in.';
    public string $lineTwo = 'In suscipit leo vitae diam egestas, sed lobortis lectus interdum. Sed id odio luctus, scelerisque dui nec, molestie sapien. Etiam sit amet molestie augue. Nam ultrices mollis dolor eu rhoncus. Fusce at enim diam. Morbi ut libero enim. Nulla felis mauris, scelerisque vitae lorem ac, mollis maximus est.';
    public string $lineThree = 'Fusce vel sapien pharetra, dapibus urna id, eleifend mi. Cras a eros lobortis, porttitor eros quis, mattis ipsum. Curabitur cursus purus non feugiat pulvinar. Nunc quis ex ac ligula sagittis interdum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque hendrerit, ipsum sed porttitor egestas, diam sem faucibus quam, in scelerisque metus ipsum ac felis. Nunc condimentum metus id ante hendrerit, at posuere magna condimentum. Nullam dignissim sem sed velit porttitor facilisis. Ut elementum risus nec euismod dictum. Nam nulla justo, facilisis vel volutpat eu, ornare id lectus. Nulla mattis metus turpis, et placerat mauris iaculis nec. Proin tristique purus vel tristique blandit. Nunc volutpat bibendum dui non accumsan.';
    public string $lineFour = 'Aliquam lobortis id leo eu ultricies. Praesent mattis sapien sed lacus eleifend finibus. Etiam volutpat ullamcorper nunc ultricies cursus. Phasellus euismod consequat placerat. Vivamus a nunc ac quam tincidunt porta. In ut augue magna. Nunc interdum non dolor eget placerat. Integer auctor viverra nibh id semper. Phasellus rhoncus turpis quis erat imperdiet vehicula. Integer gravida tincidunt nisi, quis maximus nibh cursus et. Vestibulum dui augue, tincidunt vitae odio ut, sodales ultrices augue. Morbi sed eros ac velit ullamcorper placerat et at risus. Suspendisse sodales porttitor rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent et hendrerit ligula.';
    public string $lineFive = 'Ut tincidunt ornare velit eget rutrum. Vestibulum ac justo justo. Nunc lobortis tellus ut ipsum imperdiet vestibulum. Donec nec dolor imperdiet, molestie tortor vel, rhoncus ex. Cras sit amet enim sapien. Suspendisse ornare congue est. Fusce convallis ex id euismod finibus. Etiam id sapien eros.';
    public string $lineSix = 'Proin ultricies dignissim magna sed ornare. Etiam sed vestibulum magna. Duis rutrum velit metus. Etiam vitae posuere nisl, eget volutpat augue. Nullam quis eros eu erat feugiat finibus. Pellentesque blandit vel diam sit amet pellentesque. Vestibulum pharetra purus eu pretium semper. Morbi facilisis quam nisl, non viverra lectus elementum sed. Duis molestie faucibus dui quis gravida.';
    public string $lineSeven = 'Pellentesque vitae nisl massa. Sed sit amet tincidunt sem, nec tincidunt justo. Nullam sit amet augue nec lacus varius hendrerit. Suspendisse semper massa non metus vulputate vestibulum. Maecenas sit amet neque mauris. Vestibulum et ipsum posuere, sodales sapien eget, volutpat ligula. Integer in ultrices nisl. Mauris consectetur ipsum a enim lacinia dapibus. Nunc finibus justo nec egestas tempus. Quisque pharetra sodales ullamcorper.';
    public string $lineEight = 'Nam euismod enim sit amet dui gravida, sit amet efficitur nisi dictum. Aliquam sed arcu volutpat dolor suscipit tristique. Phasellus consequat interdum velit eget rhoncus. Suspendisse sit amet turpis id leo fermentum dignissim. Suspendisse potenti. In imperdiet neque erat, a imperdiet dolor blandit in. In in metus ligula. Aliquam eget tincidunt ex. Cras interdum enim eu convallis maximus. Vivamus aliquet ultricies urna vitae tempus. Ut sit amet velit nec diam commodo ultrices consectetur vel nulla.';
    public string $lineNine = 'Nunc finibus at quam non fermentum. Integer rhoncus mi ac ipsum egestas porta. Vivamus cursus malesuada turpis nec suscipit. Phasellus at neque quis ex egestas egestas. Nulla sit amet hendrerit mi. Vivamus suscipit tincidunt cursus. Fusce non turpis magna. Morbi aliquet venenatis quam, vehicula porta enim tincidunt id. Cras aliquam imperdiet augue at volutpat.';
    public string $lineTen = 'Suspendisse dictum elit id malesuada finibus. Etiam lectus nunc, facilisis quis ullamcorper non, commodo non elit. In porta neque velit, quis dapibus lectus ultricies at. Aliquam et aliquam ante. Aliquam molestie magna massa, id dictum lectus bibendum fermentum. Nunc neque sapien, blandit quis euismod eget, tristique dapibus libero. Maecenas ut vehicula diam. Ut id auctor lacus, sit amet dictum justo. Praesent dignissim lorem non mi bibendum sagittis. Morbi lacinia mauris id tristique vestibulum. Donec massa enim, aliquam in turpis vel, faucibus sollicitudin lacus. Proin ultricies at est a hendrerit. Etiam tincidunt sapien eget velit ullamcorper gravida. Cras convallis dapibus porta. Cras placerat diam id euismod tristique. Quisque sit amet lectus in velit blandit ultricies sed et lectus.';
    public string $lineEleven = 'Donec sodales turpis quis magna imperdiet, non consequat lacus pulvinar. Maecenas lacus dui, faucibus ac sodales vitae, sodales sit amet ante. Nam lacinia lacus in augue maximus rutrum. Maecenas vestibulum accumsan dolor, sed imperdiet ipsum auctor eget. Sed egestas ut sapien congue ornare. Aenean in massa vitae lacus finibus ultricies. Ut finibus lectus id est venenatis bibendum. Aliquam erat volutpat. Nulla risus tellus, maximus vel rutrum at, pharetra ut justo. Etiam tincidunt metus eget pretium molestie. Pellentesque elementum massa sed dolor bibendum auctor. Duis posuere augue pulvinar tortor porttitor, consectetur pellentesque orci placerat. Phasellus a lacus sit amet ante varius volutpat. Praesent sed dictum ex, consectetur vulputate neque.';
    public string $lineTwelve = 'Aenean rutrum feugiat ex, quis gravida tortor tincidunt ac. Suspendisse vestibulum erat eget convallis mattis. Maecenas hendrerit dolor vel bibendum vehicula. Nam sagittis est eu lacus mollis, sit amet lobortis nisl lacinia. Curabitur pulvinar sed arcu eu dignissim. Nunc dictum sem at tristique interdum. Aliquam efficitur laoreet nibh, sit amet eleifend sapien luctus mattis. Curabitur ante urna, tempor dictum sem vel, gravida aliquam eros. Aliquam vehicula nibh metus, id volutpat augue pretium at.';
    public string $lineThirteen = 'Etiam eu commodo leo. Donec ut commodo ante, at mollis odio. Vestibulum pulvinar lorem eu purus facilisis sollicitudin. Curabitur purus mi, consectetur quis elit ac, volutpat viverra ligula.';

    public function getFullText(): string
    {
        return $this->lineOne
            . PHP_EOL
            . $this->lineTwo
            . PHP_EOL
            . $this->lineThree
            . PHP_EOL
            . $this->lineFour
            . PHP_EOL
            . $this->lineFive
            . PHP_EOL
            . $this->lineSix
            . PHP_EOL
            . $this->lineSeven
            . PHP_EOL
            . $this->lineEight
            . PHP_EOL
            . $this->lineNine
            . PHP_EOL
            . $this->lineTen
            . PHP_EOL
            . $this->lineEleven
            . PHP_EOL
            . $this->lineTwelve
            . PHP_EOL
            . $this->lineThirteen;
    }

    public function getImage(): SplFileObject
    {
        return new SplFileObject(dirname(__DIR__, 2) . '/assets/image.png', 'r');
    }
}
