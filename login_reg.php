<?php
include('includes/header.inc.php');
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and signup page</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
   
    <div id="login-signup">
        <h3>Login</h3>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button>Entrar</button>
        </form>

        <?php
        check_login_errors();
        ?>
        
        <?php
        output_username();
        ?>

        <h3>Registro</h3>
        <form action="includes/signup.inc.php" method="post">
            <?php
            signup_inputs();
            ?>
            <button>Registrar</button>
        </form>

        <?php
        check_signup_errors();
        ?>

        <h3>Logout</h3>
        <form action="includes/logout.inc.php" method="post">
            <button>Sair</button>
        </form>

    </div>
    
</body>
</html>