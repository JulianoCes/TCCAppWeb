<?php   
  require_once "functions/product.php";
  $pdoConnection = require_once "connection.php";
  $products = getProducts($pdoConnection);
?>
<!DOCTYPE html>
<html>
  <head>
    <m,eta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="theme-color" content="#563d7c">
    <link rel="stylesheet" type="text/css" href="css/css.css">
    <style type="text/css">
      .relative{
        position: relative;
        top: 0px;
        left: -9px;
      }
      .font{
        font-size: 14px
      }
    </style>
    <title>Carnes do Bom</title>
  </head>

  <body>
    <header>
    
      <nav class="navbar navbar-expand-lg navbar-dark  bg-danger">
          <a class="navbar-brand" href="index-logado.php">Carnes do Bom</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="novousu.html">Cadastrar-se</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.html">Logar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Carrinho</a>
            </li>
          </ul>
        </div>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar Açougue" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Pesquisar</button>
          </form>   
      </nav>
    </header>       

<main role="main" class="container">
  <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-danger rounded shadow-sm">
    <img class="mr-3" src="imagens/icone1.jpg" alt="" width="48" height="48">
    <div class="lh-100">
      <h6 class="mb-0 text-white lh-100">Açougue Ribeiro</h6>
      <small>Since 2011</small>
    </div>
  </div>

  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0" id="ListaCortes">Cortes Bovinos</h6>
    <div class="media text-muted pt-1">
      <div class="container">
        <div class="row">
          <?php foreach($products as $product) : ?>
          <div class="col-4">
            <div class="card">
              <div class="card-body">
                 <h4 class="card-title"><?php echo $product['nome']?></h4>
                 <h6 class="card-subtitle mb-2 text-muted">
                    R$<?php echo number_format($product['preco'], 2, ',', '.')?>
                 </h6>
                 <a href="carrinho.php?acao=add&id=<?php echo $product['id']?>"><button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Comprar</button> </a>
              </div>
            </div>
          </div>

          <?php endforeach;?> 
        </div>
      </div>
    </div>

    <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0" id="ListaCortes">Cortes Suínos</h6>
    <div class="media text-muted pt-1">
      <div class="container">
        <div class="row">
          
        </div>
      </div>
    </div>

    <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0" id="ListaCortes">Frios</h6>
    <div class="media text-muted pt-1">
      <div class="container">
        <div class="row">
          
        </div>
      </div>
    </div>
</main>





    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Voltar ao topo</a>
        </p>
        <h4>Menu</h4>
        <p><a href="" class="text-muted">Trabalhe Conosco</a></p>
        <p>Email: carnesdobom@gmail.com</p>
        <p><a href="" class="text-muted">Duvidas</a></p>
      </div>
    </footer>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>