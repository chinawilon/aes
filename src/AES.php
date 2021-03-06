<?php

namespace AES;

class AES
{
    /**
     * key
     * @var string
     */
    private $key;

    /**
     * method
     * @var string
     */
    private $cipher;

    /**
     * iv length
     * @var int
     */
    private $ivlen;


    /**
     * AES constructor.
     *
     * @param $key
     * @param string $cipher
     * @param int $ivlen
     */
    public function __construct($key, $cipher = 'aes-128-gcm', $ivlen = 12)
    {
        $this->cipher = $cipher;
        $this->ivlen = $ivlen;
        $this->key = hex2bin($key);
    }

    /**
     * AES GCM 128
     *
     * @param $cipherText
     * @param callable|null $callback
     * @return string|false
     */
    public function decrypt($cipherText, callable $callback = null)
    {
        if (! is_null($callback)) {
            $cipherText = call_user_func($callback, $cipherText);
        } else {
            // method base64_encode as default return
            $cipherText = base64_decode($cipherText);
        }
        $iv   = substr($cipherText, 0, $this->ivlen);
        $data = substr($cipherText, $this->ivlen, strlen($cipherText) - 16 - $this->ivlen);
        $tag  = substr($cipherText, strlen($cipherText) - 16);
        return openssl_decrypt($data, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv, $tag);
    }

    /**
     * AES GCM 128
     *
     * @param string $plainText
     * @param callable|null $callback
     * @return string
     * @throws AESException
     */
    public function encrypt($plainText, callable $callback = null)
    {
        $iv = openssl_random_pseudo_bytes($this->ivlen, $result);
        if (! $result) {
            throw new AESException('random bytes error');
        }
        $tag = null;
        $data = openssl_encrypt($plainText, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv, $tag);
        $data = $iv . $data . $tag;

        if (! is_null($callback)) {
            return call_user_func($callback, $data);
        }
        // use the base64_encode as default method to return
        return rtrim(base64_encode($data), "=");;
    }

}