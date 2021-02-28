<?php

use AES\AES;
use PHPUnit\Framework\TestCase;

class AESTest extends TestCase
{

    public function testAES()
    {
        $plain = "test中文test!!";
        $key = "abc132123123123e425ab234523a45ef";
        $aes = new AES($key);
        $this->assertEquals(
            $aes->decrypt($aes->encrypt($plain)),
            $plain
        );
    }
}