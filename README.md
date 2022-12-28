# DevUtils
## Install

`composer require jtrw/devutils`

## Functions
```php
dd(['test' => 1]);
```

Transliterate Convert cyr text to lat
```php
$str = transliterate($str);
```

## CliUtils

```php
CliUtils::e('Some message'); // Output: [ERROR] Some message
CliUtils::i('Some message'); // Output: [INFO] Some message
CliUtils::s('Some message'); // Output: [OK] Some message
CliUtils::w('Some message'); // Output: [WARNING] Some message
```
You can choose some color for text:
```php
CliUtils::color('Some text', 'red');
```
Supported Colors:
1. black
1. dark_gray
1. blue
1. light_blue
1. green
1. light_green
1. cyan
1. light_cyan
1. red
1. light_red
1. purple
1. light_purple
1. brown
1. yellow
1. light_gray
1. white

## LoggerTrait
Use

```php
class SomeClass
{
    use Jtrw\DevUtils\Logger\Traits\LoggerTrait;

    public function (LoggerInterface $logger)
    {
        $this->setLogger($logger)
    }

    public function doSome(array $params)
    {
        $this->i("Info for debug");
        $this->d("Debug something", $params);
        try {
            //Some logic
        } catch (Exception $exp) {
            $this->logException($exp, LOG_CRIT, "Exception happened");
        }
    }
}
```
