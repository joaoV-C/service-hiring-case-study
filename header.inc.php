<?php
require_once 'config_session.inc.php';
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
    <!-- Barra de Menu Superior -->
    <header>
        <nav>
            <div class="navmenu">
                <ul>
                    <li><a href="index.php">Início</a></li>
                    <li><a href="portfolio.php">Portfólio</a></li>
                    <li><a href="pedido.php">Pedido de Orçamento</a></li>
                    <li><a href="contactos.php">Contactos</a></li>
                </ul>
            </div>
            <div class="login_logout">
                <?php
                if (!isset($_SESSION["user_id"])) { ?>
                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                        <span id="login-cont">
                            <input type="submit" name="login" id="login-btn" value="ENTRAR">
                        </span>
                    </form>
                <?php } elseif (isset($_SESSION["user_id"])) { ?>
                    <form action="includes/logout.inc.php" method="post">
                        <span id="login-cont">
                            <input type="submit" name="logout" value="SAIR">
                        </span>
                    </form>
                    <form action="includes/profile.inc.php" method="post">
                        <span id="profile-btn">
                            <input type="submit" name="profile" value="PERFIL">
                        </span>
                    </form>
                <?php } ?>

            </div>
        </nav>
    </header>
</body>

</html>
<?php
if (isset($_POST['login'])) {
    header("Location: login_reg.php");
    exit;
}
?>