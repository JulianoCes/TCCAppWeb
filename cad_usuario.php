<?php
    session_start();
    include("conecta.php");
    $nomecomusu = $_POST['nomecomusu'];
    $nomeusu = $_POST['nomeusu'];
    $cpfusu = $_POST['cpfusu'];
    $enderecousu = $_POST['enderecousu'];
    $complementousu = $_POST['complementousu'];
    $numerousu = $_POST['numerousu'];
    $celularusu = $_POST['celularusu'];
    $sexousu = $_POST['sexousu'];
    $emailusu = $_POST['emailusu'];
    $senhausu = $_POST['senhausu'];
    $telefoneusu = $_POST['telefoneusu'];

    $novo = mysqli_query($conn, "SELECT * FROM usuario WHERE emailusu = '$emailusu' AND cpfusu = '$cpfusu'") or die (mysqli_error($conn));
    if (mysqli_num_rows($novo) > 0){
        $usuario = mysqli_query($conn, "SELECT * FROM usuario WHERE emailusu = '$emailusu'AND cpfusu = '$cpfusu'")or die (mysqli_error($conn));
        if(mysqli_num_rows($usuario)>0){
            echo ("<script>alert('Cliente já cadastrado em nossa base de dados!')</script>");
            echo ("<script>location.href='novousu.html';</script>");
            mysqli_close($conn);

        }
    }

    $sql = "INSERT INTO usuario(nomecomusu,nomeusu,cpfusu,enderecousu,complementousu,numerousu,celularusu,sexousu,emailusu,senhausu,telefoneusu) VALUES ('$nomecomusu','$nomeusu','$cpfusu','$enderecousu','$complementousu','$numerousu','$celularusu','$sexousu','$emailusu','$senhausu','$telefoneusu')";
    if(mysqli_query($conn,$sql)){
        echo "<script language='javascript' type='text/javascript'>
        alert('Cliente cadastrado com sucesso!');
        window.location.href='index.html';
        </script>";
    }else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Cliente não foi cadastrado!');
        window.location.href='cad_usuario.php';
        </script>";
    }
    mysqli_close($conn);
?>

