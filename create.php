<?php
	include 'dao.php';
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$nome = $_POST["nome"];
		$nsocial = $_POST["nsocial"];
		$cpf = $_POST["cpf"];
		$email = $_POST["email"];
		$endereco = $_POST["endereco"];
		$sexo = $_POST["sexo"];
		
		$sql = "INSERT INTO pessoa (nome, nomesocial, cpf, email, endereco, sexo) VALUES('$nome','$nsocial','$cpf','$email','$endereco','$sexo')";
		
		if ($conn->query($sql) === TRUE){
			echo "Novo usuário criado com sucesso";
		} else {
			echo "Erro: " . $sql . "<br>" . $conn->error;
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
	<div class="container">
		<h2>Criar Usuários</h2>
		<form method="post" action="">
			<br>Nome: <input type="text" name="nome" required></br>
			<br>Nome Social: <input type="text" name="nsocial" required></br>
			<br>CPF: <input type="text" name="cpf" required></br>
			<br>Email: <input type="email" name="email" required></br>
			<br>Endereco: <input type="text" name="endereco" required></br>
			<br>Sexo:
			<select name="sexo">
	      		<option value="M">Masculino</option>
	      		<option value="F">Feminino</option>
	      		<option value="O">Outros</option>
	    	</select><br></br>	
		
			<button type="submit">Criar Usuário</button><br></br>
		</form>
		<form action="index.php" method="get">
			<button class='delete' type="submit">Voltar</button>
		</form>
	</div>


</body>
</html>