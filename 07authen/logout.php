<?php
require 'includes/init.php';

Auth::logout();

header("Location: myblog.php");
?>