<?php
include "namespaces_constant.php";
include "namespaces_sub1.php";
include "namespaces_sub2.php";

echo myconstants\NAME;
echo myconstants\Sub1\NAME;
echo myconstants\Sub2\NAME;

echo myconstants\Sub1\FILE_NAME;
?>