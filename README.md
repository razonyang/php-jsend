JSend port for PHP
==================

[![Build Status](https://travis-ci.org/razonyang/php-jsend.svg?branch=master)](https://travis-ci.org/razonyang/php-jsend)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/razonyang/php-jsend/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/razonyang/php-jsend/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/razonyang/php-jsend/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/razonyang/php-jsend/?branch=master)
[![Latest Stable Version](https://img.shields.io/packagist/v/razonyang/jsend.svg)](https://packagist.org/packages/razonyang/jsend)
[![Total Downloads](https://img.shields.io/packagist/dt/razonyang/jsend.svg)](https://packagist.org/packages/razonyang/jsend)
[![LICENSE](https://img.shields.io/github/license/razonyang/php-jsend)](LICENSE)

The package is a PHP's implementation of [JSend](https://github.com/omniti-labs/jsend) specification.

Installation
------------

```
composer require razonyang/jsend
```

Usage
-----

```php
// generates resposne payload.
$payload = PayloadFactory::success($data); // success payload.
// $payload = PayloadFactory::fail($data); // fail payload.
// $payload = PayloadFactory::error($message, $code, $data); // error payload, the code and data are optional.

// if the factory is not suite for your case, creates payload instance directly.
// $payload = (new Payload())->setStatus($status)->setData($data);

// sends response.
echo $payload->toString($options); // the options the second parameter of json_encode, default to JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES

// the payload can also be formatted like this(same effect as above):
// echo json_encode($payload->toArray(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
```

Integration
-----------

- [Yii2 JSend](https://github.com/razonyang/yii2-jsend) - JSend port for Yii2