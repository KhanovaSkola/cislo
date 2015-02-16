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
use KhanovaSkola\Cislo;

Cislo::parse('nula'); // 0
Cislo::parse('jedna'); // 1
Cislo::parse('jeden'); // 1
Cislo::parse('pětadvacet'); // 25
Cislo::parse('tisíc devět set dvacet pět'); // 1925
Cislo::parse('devatenáct set dvacet pět')); // 1925
Cislo::parse('jeden tisic devet set a dvacet pet'); // 1925

Cislo::toWord(0); // nula
Cislo::toWord(1337); // tisíc tři sta třicet sedm
Cislo::toWord(3e8); // tři sta milionů
Cislo::toWord(1e9); // KhanovaSkola\\OutOfRangeException
```
