<?php
session_start();

require_once '../database/connect.php';
unset($_SESSION["username"]);
session_destroy();
header("Location: admin-login.php");