<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head> 
<body>
	<div class="cabecalho">
		<h1 class="titulo">Lista de produtos</h1>
		<nav>
			<ul>
				<li><a href="cadastroProdutos.php">Cadastro De Produtos</a></li>
				<li><a href="listaProdutos.php">Lista De Produtos</a></li>
			</ul>
		</nav>
	</div>
	<table border="1" style="margin: 20px auto;">
		<tr>
			<th>Nome</th>
			<th>Preço</th>
			<th>Detalhes</th>
			<th>Desconto</th>
			<th>Quantidade</th>
			<th>Pedidos</th>
		</tr>
		<?php
		if (file_exists('produtos.json')) {
			$produtos = json_decode(file_get_contents('produtos.json'), true);
			foreach ($produtos as $produto) {
				if ($produto) {
					echo "<tr>
						<td>{$produto['nome']}</td>
						<td>{$produto['preco']}</td>
						<td>{$produto['detalhes']}</td>
						<td>{$produto['desconto']}</td>
						<td>{$produto['quantidade']}</td>
						<td>
							<form action='pedido.php' method='POST'>
								<button name='nomeproduto' value='{$produto['nome']}' type='submit'>Pedido({$produto['nome']})</button>
							</form>
						</td>
					</tr>";
				}
			}
		}
		?>
	</table>
</body>
</html>
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
	.login{
		display: flex;
		align-self: center;
		justify-self: center;
		align-items: center;
		justify-content: center;
		height: 20px;
		width: 200px;
		margin-top: 20px;
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

	
	table {
		width: 100%;
		border-collapse: collapse;
		margin: 20px 0;
		font-family: Arial, sans-serif;
		box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
		border-radius: 8px;
		overflow: hidden;
	}


	th {
		background-color: #2c3e50;
		color: white;
		padding: 12px 15px;
		text-align: left;
		font-weight: bold;
		text-transform: uppercase;
		font-size: 14px;
	}


	td {
		padding: 12px 15px;
		border-bottom: 1px solid #e0e0e0;
		transition: background-color 0.2s ease;
	}


	tr:nth-child(even) {
		background-color: #f8f9fa;
	}

	tr:hover {
		background-color: #e3f2fd;
		cursor: pointer;
	}


	tr:last-child td {
		border-bottom: none;
	}


	td:nth-child(2) {
		font-weight: bold;
		color: #2e7d32;
	}


	td:nth-child(4) {
		color: #d32f2f;
		font-weight: bold;
	}


	td:nth-child(5) {
		text-align: center;
		font-weight: bold;
	}


	@media (max-width: 768px) {
		table {
			font-size: 14px;
		}
		
		th, td {
			padding: 8px 10px;
		}
	}
</style>