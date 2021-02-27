<?php

use AES\AES;

class AESTest extends \PHPUnit_Framework_TestCase
{

    public function testAES()
    {
        $plain = "test中文test!!";
        $key = "thisisakey";

        $aes = new AES($key);
        $this->assertEquals(
            $aes->decrypt($aes->encrypt($plain)),
            $plain
        );
    }
}