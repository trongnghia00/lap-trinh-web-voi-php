<?php
require 'includes/init.php';

Auth::logout();

header("Location: index.php");
?>