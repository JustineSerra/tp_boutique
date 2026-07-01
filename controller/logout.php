<?php

require_once "Database.php";
$_SESSION = [];
session_destroy();

header("Location: index.php");
?>