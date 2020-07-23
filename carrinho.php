<?php 
	session_start();
	require_once "functions/product.php";
	require_once "functions/cart.php";

	$pdoConnection = require_once "connection.php";

	if(isset($_GET['acao']) && in_array($_GET['acao'], array('add', 'del', 'up'))) {
		
		if($_GET['acao'] == 'add' && isset($_GET['id']) && preg_match("/^[0-9]+$/", $_GET['id'])){ 
			addCart($_GET['id'], 1);			
		}

		if($_GET['acao'] == 'del' && isset($_GET['id']) && preg_match("/^[0-9]+$/", $_GET['id'])){ 
			deleteCart($_GET['id']);
		}

		if($_GET['acao'] == 'up'){ 
			if(isset($_POST['prod']) && is_array($_POST['prod'])){ 
				foreach($_POST['prod'] as $id => $qtd){
						updateCart($id, $qtd);
				}
			}
		} 
		header('location: carrinho.php');
	}

	$resultsCarts = getContentCart($pdoConnection);
	$totalCarts  = getTotalCart($pdoConnection);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Carnes do Bom</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" />
	
</head>
<body>	
	<header>

<nav class="navbar navbar-expand-lg navbar-dark	 bg-danger">
	<a class="navbar-brand" href="index-logado.php">Carnes do Bom</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="novousu.html">Cadastre-se</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="login.html">Logar</a>
			</li>
		</ul>
	</div>
	<form class="form-inline my-2 my-lg-0">
		<input class="form-control mr-sm-2" type="search" placeholder="Pesquisar Açougue" aria-label="Search">
		<button class="btn btn-outline-light my-2 my-sm-0" type="submit">Pesquisar</button>
	</form>
</nav>
 </header>
	<div class="container">
		<div class="card mt-5">
			 <div class="card-body">
	    		<h4 class="card-title">Carrinho</h4>
	    		<a href="index-logado.php">Lista de Açougues</a>
	    	</div>
		</div>

		<?php if($resultsCarts) : ?>
			<form action="carrinho.php?acao=up" method="post">
			<table class="table table-strip">
				<thead>
					<tr>
						<th>Produto</th>
						<th>Quantidade</th>
						<th>Preço</th>
						<th>Subtotal</th>
						<th>Ação</th>

					</tr>				
				</thead>
				<tbody>
				  <?php foreach($resultsCarts as $result) : ?>
					<tr>
						
						<td><?php echo $result['name']?></td>
						<td>
							<input type="text" name="prod[<?php echo $result['id']?>]" value="<?php echo $result['quantity']?>" size="1" />
														
							</td>
						<td>R$<?php echo number_format($result['price'], 2, ',', '.')?></td>
						<td>R$<?php echo number_format($result['subtotal'], 2, ',', '.')?></td>
						<td><a href="carrinho.php?acao=del&id=<?php echo $result['id']?>" class="btn btn-danger">Remover</a></td>
						
					</tr>
				<?php endforeach;?>
				 <tr>
				 	<td colspan="3" class="text-right"><b>Total: </b></td>
				 	<td>R$<?php echo number_format($totalCarts, 2, ',', '.')?></td>
				 	<td></td>
				 </tr>
				</tbody>
				
			</table>

			<a class="btn btn-danger" href="acougue1.php">Continuar Comprando</a>
			<button class="btn btn-danger" type="submit">Atualizar Carrinho</button>
			<a href=""><button class="btn btn-danger" style="float: right;">Finalizar compra</button></a>

			</form>
	<?php endif?>
		
	</div>
	<footer class="text-muted">
		
	<hr class="border-danger">
		  <div class="container">
		    <p class="float-right">
		      <a href="#">Voltar ao topo</a>
		    </p>
		    <h4>Menu</h4>
		    <p><a href="" class="text-muted">Trabalhe Conosco</a></p>
		    <p class="text-muted">Email: carnesdobom@gmail.com</p>
		    <p><a href="" class="text-muted">Duvidas</a></p>
		  </div>
		</footer>
</body>
</html>