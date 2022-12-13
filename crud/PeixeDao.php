<?php
    include_once "Peixe.php";

    class PeixeDao{

        function databaseConnection(){
            
            $conn = new PDO("mysql:host=localhost;dbname=crud", "aluno", "aluno");
        
            if(!$conn){
                echo "Erro na conexão!";
                return null;
            }
            return $conn;
        }
        
        function get_peixe($id){

            $conn = $this->databaseConnection();
        
            $sql = "SELECT * FROM peixes WHERE id=$id;";
            $query = $conn -> query($sql);
        
            if(!$query){
                return array();
            }
            
            $data = $query -> fetch();
            $peixe = new Peixe($data["especie"], $data["cor"], $data["peso"]);
            $peixe -> set_id($data["id"]);

            return $peixe;
        }

        function cadastrar_peixe($especie, $cor, $peso){

            $conn = $this->databaseConnection();

            $sql = "INSERT INTO peixes VALUES (id, '$especie', '$cor', '$peso' );";
            $query = $conn -> query($sql);
            
            if(!$query){
                echo 'Erro ao inserir peixe';
                return false;
            }
        
            return true;
        }

        function listar_peixes() {

            $peixes = array();
            $conn = $this->databaseConnection();
       
            $sql = "SELECT * FROM peixes;";      
            $query = $conn->query($sql)->fetchAll();

            if(!$query){
                return array();
            }

            foreach($query as $row){
                $peixe = new Peixe($row["especie"], $row["cor"], $row["peso"]);
                $peixe->set_id($row["id"]);
                array_push($peixes, $peixe);
            }
        
            return $peixes;
        }

        function alterar_peixe($id, $especie, $cor, $peso){
            $conn = $this->databaseConnection();
        
            $sql = "UPDATE peixes SET especie='$especie', cor='$cor', peso='$peso' WHERE id=$id;";
            $query = $conn->query($sql);
        
            if(!$query){
                echo 'Erro ao alterar peixe';
                return false;
            }
        
            return true;
        }
        
        function excluir_peixe($id) {
            $conn = $this->databaseConnection();
        
            $sql = "DELETE FROM peixes WHERE id=$id;";
        
            $query = $conn->query($sql);
        
            if(!$query){
                echo 'Erro ao deletar peixe';
                return false;
            }
        
            return true;
        }

    }
?>