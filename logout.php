<?php
session_start();
unset($_SESSION['yhm']);
header('location:index.php');