<?php
// require('config.php');
if (!isset($_SESSION['bibliotecario'])) {
    header('Location: loginBibliotecario.php');
    exit;
}
?>