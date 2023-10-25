<?php
if (isset($_GET['list_created']) && $_GET['list_created'] == 1) {
    echo '<script>alert("Lijst aangemaakt");</script>';
}
if (isset($_GET['user_registered']) && $_GET['user_registered'] == 1) {
    echo '<script>alert("Account aangemaakt");</script>';
}
session_start();
include('Mainpages/E-learning_page.php');
include('DBconfig.php');
include('inlog.php');
?>