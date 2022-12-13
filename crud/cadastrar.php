<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar peixe</title>
    <link rel="stylesheet" href="./style-form.css">
</head>
<body>

    <?php 
	
		session_start();

		if(!isset($_SESSION['auth']) && $_SESSION['auth'] != "true") {
			header("Location: login.php");
		}
	
	?>

    <section>
        
        <h1>Cadastrar peixe</h1>

        <form action="cadastrar.php" method="post">

            <input type="text" name="especie" id="especie" placeholder="Espécie ..." required>
            <input type="text" name="cor" id="cor" placeholder="Cor ..." required>
            <input type="text" name="peso" id="peso" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" placeholder="Peso (exemplo: 9.84)" required>

            <input type="submit" value="Cadastrar">

        </form>
    </section>

    <?php 
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $especie = $_POST['especie'];
            $cor = $_POST['cor'];
            $peso = $_POST['peso'];

            include_once "PeixeController.php";
            include_once "Peixe.php";
            
            $peixeController = new PeixeController();
            
            $peixes = $peixeController -> cadastrar_peixe($especie, $cor, $peso);

            header("Location: index.php?success=cadastrado");

        }

    ?>

</body>
</html>