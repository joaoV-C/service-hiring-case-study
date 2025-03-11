<?php
include('includes/header.inc.php');
require_once 'includes/dbh.inc.php';
require_once 'includes/config_session.inc.php';
require_once 'includes/profile_view.inc.php';
require_once 'includes/profile_contr.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div id="profile-container">
        <?php
        show_orders($pdo);
        ?>

        <?php
        $user_username = $_SESSION["user_username"];
        show_appointments($pdo);
        ?>
    </div>
</body>
</html>
