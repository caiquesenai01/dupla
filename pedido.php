<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>Pedido realizado com sucesso</h1>
	<nav>
		<ul>
			<li><a href="cadastroProdutos.php">Cadastro De Produtos</a></li>
			<li><a href="listaProdutos.php">Lista De Produtos</a></li>
		</ul>
	</nav>	
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