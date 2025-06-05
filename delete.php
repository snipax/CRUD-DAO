<?php

    include 'dao.php';
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["codigo"])){
        $id = $_GET["codigo"];

        try {
            $sql = "DELETE FROM pessoa WHERE CODIGO = :codigo";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':codigo', $id);
            $stmt->execute();
            echo "Usuario deletado com sucesso!";
            header("location: index.php");
            exit;
            
        }
        catch(PDOException $e){
            echo "Erro: " . $e->getMessage();
        }
    }
?>
