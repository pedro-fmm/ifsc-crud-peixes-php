<?php
    if (isset($_POST["username"]) && isset($_POST["password"])){
        if ($_POST["username"] == "pedro" && $_POST["password"] == "lindo"){
            session_start();
            $_SESSION["auth"] = "true";
            header("Location: index.php");
        }else{
            header("Location: login.php?message='Credenciais inválidas'");
        }
    }else{
        header("Location: login.php?message='Preencha todos os campos'");
    }
?>