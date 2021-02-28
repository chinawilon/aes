
# AES

[![Build Status](https://travis-ci.org/chinawilon/aes.svg?branch=main)](https://travis-ci.org/chinawilon/aes)
[![codecov](https://codecov.io/gh/chinawilon/aes/branch/main/graph/badge.svg?token=DL98WPG4SM)](https://codecov.io/gh/chinawilon/aes)
![Supported PHP versions: =7.1+](https://img.shields.io/badge/php-7.1+-blue.svg)


example:
```php
use AES\AES;

$plain = "test中文test!!";
$key = "abc132123123123e425ab234523a45ef"; //must be hexadecimal string

$aes = new AES($key, 'aes-128-gcm');
$encrypt = $aes->encrypt($plain);
// 3vhFDoifaCXTZdA5nyZxH5ajrbGFdVFHFJhT8Qw8yVDj/UQoWONn40/NdaQ

$aes->decrypt($encrypt);
// test中文test!!
```

# License
MIT