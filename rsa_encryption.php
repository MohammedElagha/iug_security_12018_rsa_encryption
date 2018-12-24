<?php

class RSAEncryption
{

    $pubkey = '...public key here...';
    $privkey = '...private key here...';

    public function encrypt($data)
    {
        if (openssl_public_encrypt($data, $encrypted, $this->pubkey))
            $data = base64_encode($encrypted);
        else
            $data = "Unable to encrypt data. Perhaps it is bigger than the key size?";

        return $data;
    }

    public function decrypt($data)
    {
        if (openssl_private_decrypt(base64_decode($data), $decrypted, $this->privkey))
            $data = $decrypted;
        else
            $data = '';

        return $data;
    }
}


?>