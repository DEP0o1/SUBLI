<?php
session_start();
require('config.php');
if (!isset($_SESSION['leitor'])) {
    header('Location: login.php');
    exit;
}
?>