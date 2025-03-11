<?php

session_start();
session_unset();
session_destroy();


if (isset($_POST['logout'])) {
    header("Location: ../login_reg.php");
    exit;
}

header("Location: ../login_reg.php");
die();