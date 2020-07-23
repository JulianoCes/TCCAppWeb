<?php 


//Dados do banco de dados
	$servername = "localhost";
	$username = "root";
	$password = "";
    $database = "tcc";   
    
    global $pdo;
//Conexao com Banco de Dados
  try {
  	$pdo = new PDO("mysql:dbname=".$database."; host=".$servername,$username,$password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
  	echo "ERRO:".$e->getMessage();
  	exit;
  }
?>
