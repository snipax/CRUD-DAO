<?php
	include 'dao.php';
	$sql = "SELECT * FROM pessoa";
	$result = $conn->query($sql);
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="style.css">
	<title>Cadastro</title>
</head>
<body>
	<div class="container">
		<button class="button-create" onclick="window.location.href='create.php'">Criar Novo Usuário</button>
  		<h2>Lista de Usuários</h2>
		<?php
			if ($result->num_rows > 0){
				while ($row = $result->fetch_assoc()){
					echo "<div class='user-list'>";
					echo "ID: " . $row["CODIGO"] . " - Nome: " . $row["NOME"] . " - NOMESOCIAL: " . $row["NOMESOCIAL"] . " - CPF: " . $row["CPF"] . " - EMAIL: " . $row["EMAIL"] . " - ENDERECO: " . $row["ENDERECO"] . " - SEXO: " . $row["SEXO"] ;
					echo "<div class='action-buttons'>";
					echo "<button class='edit' onclick=\"window.location.href='update.php?codigo=" . $row["CODIGO"] . "'\">Editar</button>";
					echo "<button class='delete' onclick=\"if(confirm('Tem certeza que deseja excluir?')) { window.location.href='delete.php?codigo=" . $row["CODIGO"] . "'; }\">Excluir</button>";
					echo "</div></div>";
				}
			} else {
				echo "<p>Nenhum usuário encontrado.</p>";
			}
			$conn->close();
		?>
	</div>
</body>
</html>



