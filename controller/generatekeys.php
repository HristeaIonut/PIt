<?php
$cipher = "AES-128-CTR";
$key = "6bd527bdbe333d7faf1990c92b7fbc885e11b5e86218e6ddbb9aae0b992f0869b3bc8b8f1424c80f05c425d176a8742d0699dcd445e638d256b8f67ed21bc989";
$iv_length = openssl_cipher_iv_length($cipher);
$iv = '1234567891011121';