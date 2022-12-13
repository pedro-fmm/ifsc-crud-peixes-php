<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar peixe</title>
    <link rel="stylesheet" href="./style-form.css">
</head>
<body>

    <?php 
	
		session_start();

		if(!isset($_SESSION['auth']) && $_SESSION['auth'] != "true") {
			header("Location: login.php");
		}
	
	?>

    <?php 
        
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include_once "PeixeController.php";
            include_once "Peixe.php";
                
            $id = $_GET['id'];
            
            $peixeController = new PeixeController();
            
            $peixe = $peixeController -> get_peixe($id);

            $especie = $peixe -> get_especie();
            $cor = $peixe -> get_cor();
            $peso = $peixe -> get_peso();
        }
    ?>

    <section>
        
        <h1>Alterar peixe</h1>

        <form action="alterar.php" method="post">

            <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
            <input type="text" name="especie" id="especie" value="<?php echo $especie ?>" required>
            <input type="text" name="cor" id="cor" value="<?php echo $cor ?>" required>
            <input type="text" name="peso" id="peso" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" value="<?php echo $peso ?>" required>

            <input type="submit" value="Cadastrar">

        </form>
    </section>

    <?php 
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $id  = $_POST['id'];
            $especie = $_POST['especie'];
            $cor = $_POST['cor'];
            $peso = $_POST['peso'];

            include_once "PeixeController.php";
            include_once "Peixe.php";
            
            $peixeController = new PeixeController();
            
            $peixes = $peixeController -> alterar_peixe($id, $especie, $cor, $peso);

            header("Location: index.php?success=cadastrado");

        }

    ?>

</body>
</html>