<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./style-login.css">
</head>

<?php
    echo $_SESSION['auth'];
    if(isset($_GET['message'])) {
        $message = $_GET['message'];
        echo "$message";
    }
?>

<?php
    session_start();
    if(isset($_SESSION["auth"]) && $_SESSION["auth"] == 'logado') {
        header("Location: index.php");
    }
?>

<body>

    <section>
        <h1>Bem vindo!</h1>
        <form class="login" action="auth.php" method="POST">
            <input name="username" id="username" type="text" placeholder="Usuário">
            <input name="password" id="password" type="password" placeholder="Senha">
            <input type="submit" value="Login">
        </form>
    </section>

</body>
</html>