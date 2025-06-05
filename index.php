<?php
	include 'dao.php';
	$sql = "SELECT * FROM pessoa";
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

		try {
			$result = $conn->query($sql);
			if ($result && $result->rowCount() > 0){
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					echo "<div class='user-list'>";
					echo "ID: " . $row["CODIGO"] . " - Nome: " . $row["NOME"] . " - NOMESOCIAL: " . $row["NOMESOCIAL"] . " - CPF: " . $row["CPF"] . " - EMAIL: " . $row["EMAIL"] . " - ENDERECO: " . $row["ENDERECO"] . " - SEXO: " . $row["SEXO"] ;
					echo "<div class='action-buttons'>";
					echo "<button class='edit' onclick=\"window.location.href='update.php?codigo=" . $row["CODIGO"] . "'\">Editar</button>";
					echo "<button class='delete' onclick=\"if(confirm('Tem certeza que deseja excluir?')) { window.location.href='delete.php?codigo=" . $row["CODIGO"] . "'; }\">Excluir</button>";
					echo "</div></div>";
				}
			$conn = null;
			} else {
				echo "<p>Nenhum usuário encontrado.</p>";
				$conn = null;
			}
		} catch(PDOException $e) {
			echo "Erro: " . $e->getMessage();
			$conn = null;
		
		}
		?>
	</div>
</body>
</html>



