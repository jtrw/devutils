# DevUtils

## Functions
```php
dd(['test' => 1]);
```

## CliUtils

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
