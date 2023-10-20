<?php
session_start();
include_once('connection.php');

unset($_SESSION['user']);
header('location:index.php');
?>