[![Build Status](https://travis-ci.org/chinawilon/aes.svg?branch=main)](https://travis-ci.org/chinawilon/aes)

# AES

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