<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>BOOTSTRAP CRUD LAYOUT</title>
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

	<?php 
	
		session_start();

		if(!isset($_SESSION['auth']) && $_SESSION['auth'] != "true") {
			header("Location: login.php");
		}
	
	?>

	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title text-center">PEIXES CADASTRADOS</h3>
			</div>
			
			<div class="panel-body">
				<a href="cadastrar.php" class="btn btn-primary">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo
				</a>
				
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>ESPÉCIE</th>
								<th>COR</th>
								<th>PESO</th>
                            </tr>
						</thead>

						<tbody>

                        <?php
                            include_once "PeixeController.php";
                            include_once "Peixe.php";
                            
                            $peixeController = new PeixeController();
                            
                            $peixes = $peixeController -> listar_peixes();
                            
                            foreach($peixes as $peixe){
                                $id 		= $peixe -> get_id();
                                $especie 	= $peixe -> get_especie();
                                $cor 		= $peixe -> get_cor();
                                $peso 		= $peixe -> get_peso();
                                
                                echo "
                                <tr>
                                    <td>$id</td>
                                    <td>$especie</td>
                                    <td>$cor</td>
                                    <td>$peso</td>
                                    <td>
										<a class=\"btn btn-info\" href=\"alterar.php?id=$id\"><span class=\"glyphicon glyphicon-edit\" aria-hidden=\"true\"></span>Editar</a>
										<a class=\"btn btn-danger\" href=\"excluir.php?id=$id\"><span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span>Excluir</a>
									</td>
                                </tr>
                                ";
                            }
                        ?>

					</table>
				</div>
				
			</div>
		</div>
	</div>
	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> 
</body>
</html>