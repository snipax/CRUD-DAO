<?php
include 'dao.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$codigo = $_POST["codigo"];
	$nome = $_POST["nome"];
	$nomesocial = $_POST["nomesocial"];
	$cpf = $_POST["cpf"];
	$email = $_POST["email"];
	$endereco = $_POST["endereco"];
	$sexo = $_POST["sexo"];
	
try {
	$sql = "UPDATE pessoa SET nome=:nome, nomesocial=:nomesocial, cpf=:cpf, email=:email, endereco=:endereco, sexo=:sexo WHERE codigo=:codigo";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(':nome', $nome);
	$stmt->bindValue(':nomesocial', $nomesocial);
	$stmt->bindValue(':cpf', $cpf);
	$stmt->bindValue(':email', $email);
	$stmt->bindValue(':endereco', $endereco);
	$stmt->bindValue(':sexo', $sexo);
	$stmt->bindValue(':codigo', $codigo);
	$stmt->execute();
	echo "Usuário atualizado com sucesso!";
	header("location: index.php");
	$conn = null;
	}	
catch(PDOException $e) {
	echo "Erro: " . $e->getMessage();
	$conn = null;
}
}

 else {
	if($_SERVER["REQUEST_METHOD"] ==  "GET"){
	$codigo = $_GET['codigo'];
		try {
		$sql = "SELECT * FROM pessoa WHERE codigo=:codigo";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(':codigo', $codigo);
		$stmt->execute();
		$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
		$conn = null;
		}
		catch(PDOException $e) {
			echo "Erro: " . $e->getMessage();
			$conn = null;
		}
	}
 }

?>
<!DOCTYPE html>
<head>
	<title>Página de update</title>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class="container">
		<h2>Editar de Usuários</h2>
		<form method="post" action="">
			<br>Código: <input type="text" readonly name="codigo" value="<?php echo $usuario['CODIGO']; ?>"></br>
			<br>Nome: <input type="text" name="nome" value="<?php echo $usuario['NOME']; ?>"></br>
			<br>Nome Social: <input type="text" name="nsocial" value="<?php echo $usuario['NOMESOCIAL']; ?>"></br>
			<br>CPF: <input type="number" name="cpf" value="<?php echo $usuario['CPF']; ?>"><br>
			<br>E-mail: <input type="email" name="email" value="<?php echo $usuario['EMAIL']; ?>"><br>
			<br>Endereco: <input type="text" name="endereco" value="<?php echo $usuario['ENDERECO']; ?>"></br>

			<br>Sexo: <select name="sexo">
    	  		<option value="M">Masculino</option>
    	  		<option value="F">Feminino</option>
    	  		<option value="O">Outros</option>
    		</select></br>

			<br><button type="submit">Atualizar usuário</button><br></br>

		</form>
		<form action="index.php" method="get">
			<button class='delete' type="submit">Voltar</button>
		</form>
	</div>	

</body>
</html>