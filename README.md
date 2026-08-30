# lorem-docsum

## Description
Lorem Ipsum but for documents.

Treat yourself to a document with some dummy text in it.

The original intention for this is to be used as a script to generate documents, but, you can
can also install and use it in your own projects via composer.

## Terminal Usage Instructions
1. Clone this repository and enter the directory
2. Run `composer install`
3. Run `php ./bin/lorem-docsum.php`
4. The manpage will output to the terminal what you need to do next

## Composer Usage Instructions
1. Run `composer require tomwilford/lorem-docsum`
2. Create a new instance of `BuildAction` with `NullOutputResponder` and a target directory
   - ```php
     $faker = Faker::create();
     $buildAction = new BuildAction(
        new NullOutputResponder(),
        $faker,
        new FakerContentProvider($faker),
        '/path/to/target/directory/'
     ),
     ```
3. Call `run()` on the instance with your target bytes and file type

## License
The [MIT License (MIT)](LICENSE).
