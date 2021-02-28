
# AES

[![travis][ico-travis]][link-travis]
[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Code Coverage][ico-code-coverage]][link-code-coverage]
[![Software License][ico-license]](LICENSE)

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