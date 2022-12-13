<?php 

    session_start();

    if(!isset($_SESSION['auth']) && $_SESSION['auth'] != "true") {
        header("Location: login.php");
    }

?>

<?php 

    if(isset($_GET) and $_GET['id']) {
        include_once "PeixeController.php";
        include_once "Peixe.php";
        
        $peixeController = new PeixeController();
        
        $peixes = $peixeController -> excluir_peixe($_GET['id']);

        header("Location: index.php?success=excluido");
    }

?>