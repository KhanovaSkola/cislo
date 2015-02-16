Cislo: Integer to czech word translator
=======================================

Installation
------------

With composer:
```bash
composer require khanovaskola/cislo '@dev'
```

Usage
-----

```php
KhanovaSkola\Cislo::toWord(0); // nula
KhanovaSkola\Cislo::toWord(1337); // tisíc tři sta třicet sedm
KhanovaSkola\Cislo::toWord(3e8); // tři sta milionů
KhanovaSkola\Cislo::toWord(1e9); // KhanovaSkola\\OutOfRangeException
```
