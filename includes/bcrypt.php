<?php
 
function bcrypt_hasher($password, $work_factor = 9)
  {
    $salty = '$2y$' . str_pad($work_factor, 2, '0', STR_PAD_LEFT) . '$' .
    substr(
      strtr(base64_encode(openssl_random_pseudo_bytes(16)), '+', '.'),
      0, 22
      )
    ;
    return crypt($password, $salty);
  }

function bcrypt_checker($password, $stored_hash, $legacy_handler = NULL)
  {
    return crypt($password, $stored_hash) == $stored_hash;
  }

?>