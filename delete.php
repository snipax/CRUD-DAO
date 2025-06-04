<?php

    include 'dao.php';
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["codigo"])){
        $id = $_GET["codigo"];
        $sql = "delete from pessoa where codigo = $id";
   
    if($conn->query($sql)=== TRUE){
            echo "Novo usuário deletado com sucesso!!";
        }
        else{echo "ERRO: ".$sql."<br>".$conn->error;
        }
    }
?>

<!DOCTYPE html>
<head>
    <title>Create </title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="index.php" method=get">
    <button class='delete' type="submit">Voltar</button>
    </form>
   
</body>
</html>