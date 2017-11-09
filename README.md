# tape-out-service
It is necessary to implement the service of outputting the Twitter tape with the update in real time.


## Requirements:
- mandatory presence of composer.- implementation on "pure" PHP.
- Output no more than 25 last messages. - Implementation of the frontend is arbitrary (jQuery, Angular, React).
- The architecture should allow the connection of other news tapes (other systems).

## Services

+ Twitter

## Install

+ composer install && composer dumpautoload -o

## Usage

```php
require_once "vendor/autoload.php";

define('HOME_FOLDER', __DIR__);

$app = new \Dykyi\Application();
$app->run();
```

## Tests
![image](https://github.com/dykyi-roman/tape-out-service/blob/master/images/test.png)

## Author
[Dykyi Roman](https://www.linkedin.com/in/roman-dykyi-43428543/), e-mail: [mr.dukuy@gmail.com](mailto:mr.dukuy@gmail.com)

