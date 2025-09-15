<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head> 
<body>
	<div class="cabecalho">
		<h1 class="titulo">Cadastro de produtos</h1>
		<nav>
			<ul>
				<li><a href="cadastroProdutos.php">Cadastro De Produtos</a></li>
				<li><a href="listaProdutos.php">Lista De Produtos</a></li>
			</ul>
		</nav>	
	</div>
	<form class="dados" action="" method="post">
		<input type="text" name="nome" placeholder="nome">
		<input type="text" name="preco" placeholder="preco de venda">
		<input type="text" name="detalhes" placeholder="detalhes">
		<input type="text" name="desconto" placeholder="desconto">
		<input type="text" name="quantidade" placeholder="quantidade">
		<button type="submit">Cadastrar produto</button>
	</form>
</body>
</html>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $produto = [
            'nome' => $_POST['nome'],
            'preco' => $_POST['preco'],
            'detalhes' => $_POST['detalhes'],
			'desconto' => $_POST['desconto'],
			'quantidade' => $_POST['quantidade']
        ];

        // Lê o arquivo existente ou cria um novo array
        $produtos = [];
        if (file_exists('produtos.json')) {
            $produtos = json_decode(file_get_contents('produtos.json'), true);
        }
        $produtos[] = $produto;

        // Salva no arquivo JSON
        file_put_contents('produtos.json', json_encode($produtos, JSON_PRETTY_PRINT));
        echo "<p class='mensagem'>Produto cadastrado com sucesso!</p>";
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
		align-items: center;
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
		width: 120px;
		height: 40px;
		margin-top: 20px;
		height: 40px;
		background-color: red;
		border: none;
		border-radius: 10px;
		font-size: medium;
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
</style>