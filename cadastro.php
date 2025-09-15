<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head> 
<body>
	<div class="cabecalho">
		<h1 class="titulo">Cadastro de usuarios</h1>
		<nav>
			<ul>
				<li><a href="cadastro.php">Cadastro</a></li>
				<li><a href="login.php">Login</a></li>
			</ul>
		</nav>	
	</div>
	<form class="dados" action="" method="post">
		<input type="text" name="nome" placeholder="Nome">
		<input type="email" name="email" placeholder="Email">
		<input type="password" name="senha" placeholder="Senha">
		<button type="submit">Entrar</button>
	</form>	
</body>
</html>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha']
        ];

        // Lê o arquivo existente ou cria um novo array
        $usuarios = [];
        if (file_exists('usuarios.json')) {
            $usuarios = json_decode(file_get_contents('usuarios.json'), true);
        }
        $usuarios[] = $usuario;

        // Salva no arquivo JSON
        file_put_contents('usuarios.json', json_encode($usuarios, JSON_PRETTY_PRINT));
        echo "<p class='mensagem'>Usuário cadastrado com sucesso!</p>";
    }
	?>
<style>
	body{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}
	.cabecalho{
		width: 100%;
		height: 100px;
		background-color:bisque;
		margin-bottom: 20px;
	}
	.titulo{
		display: flex;
		align-self: center;
		justify-self: center;
	}
	.dados{
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center
	}
	.dados input{
		display: flex;
		width: 300px;
		height: 30px;
		margin: 10px;
	}
	.dados button{
		display: flex;
		width: fit-content;
		align-items: center;
		justify-content: center;
		width: 100px;
		height: 20px;
		margin-top: 20px;
		height: 30px;
		background-color: red;
		border: none;
		border-radius: 10px;
		font-size: medium;
	}

	nav ul {
	list-style-type: none; 
	margin: 0;
	padding: 0;
	overflow: hidden; 
	background-color: #444; 
	}

	nav li {
	float: left; 
	}

	nav li a {
	display: block;
	color: white;
	text-align: center;
	padding: 14px 16px;
	text-decoration: none; 
	}

	nav li a:hover {
	background-color: #222; 
	}
</style>