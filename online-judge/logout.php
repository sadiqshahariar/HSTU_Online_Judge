<?php

session_start();
require_once("config.php");
unset($_SESSION['un']);
unset($_SESSION['url']);

header('location:'.SITEURL.'login.php');

?>