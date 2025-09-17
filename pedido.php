<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pedido</title>
</head>
<body>
	<div class="cabecalho">
		<h1 class="titulo">Pedido realizado com sucesso</h1>
		<nav>
			<ul>
				<li><a href="cadastroProdutos.php">Cadastro De Produtos</a></li>
				<li><a href="listaProdutos.php">Lista De Produtos</a></li>
			</ul>
		</nav>
	</div>
	<div class="container">
		<button class="retornar">
			<a href="listaProdutos.php" style="color: white; text-decoration: none;">Retornar para Lista de Produtos</a>
		</button>
	</div>
</body>
</html>
<?php
	$pedido = $_POST['nomeproduto'];
	if (file_exists('produtos.json')) {
		$produtos = json_decode(file_get_contents('produtos.json'), true);
		foreach ($produtos as $i => $produto) {
			if ($produto){
				if ($produto['nome'] == $pedido) {
					$produtos[$i]['quantidade'] = max(0, $produto['quantidade'] - 1);
				}
			}
		}
		file_put_contents('produtos.json', json_encode($produtos, JSON_PRETTY_PRINT));
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
	.container {
		display: flex;
		justify-content: center;
		align-items: center;
		margin-top: 40px;
	}
	.retornar {
		display: flex;
		align-items: center;
		justify-content: center;
		width: 220px;
		height: 40px;
		background-color: red;
		border: none;
		border-radius: 10px;
		font-size: medium;
		cursor: pointer;
	}
	.retornar a {
		width: 100%;
		height: 100%;
		display: flex;
		align-items: center;
		justify-content: center;
	}
</style>