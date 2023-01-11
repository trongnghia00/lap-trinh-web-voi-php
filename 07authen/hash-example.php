<?php
$password = 'secret';

// $hash = password_hash($password, PASSWORD_DEFAULT);

// echo $hash;

$hash = '$2y$10$al5ilIcmieNG2.H7V5FXneBzNEgUuSE85paRz4s8uvSoAHekQyTlS';

var_dump(password_verify($password, $hash));