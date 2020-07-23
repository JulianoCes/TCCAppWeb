<?php
    
    if (isset($_POST['emailusu']) && !empty($_POST['emailusu']) && isset($_POST['senhausu']) && !empty($_POST['senhausu'])) {
        
        require "connection.php";
        require "functions/UsuarioClass.php";
        

        $u = new Usuario();

        $emailusu = addslashes($_POST['emailusu']);
        $senhausu = /*base64_encode*/addslashes($_POST['senhausu']);

        if($u->login($emailusu, $senhausu) == true){
            if (isset($SESSION['iduser'])) {

                header("Location:index-logado.php");

            }else{
                header("Location:index-logado.php");
            }

        }else{
            echo ("<script>alert('Login ou senha incorretos! Tente novamente.');</script>");
            echo ("<script>location.href='login.html';</script>");
        }

    }else{

        header("Location: login.html");

    }

?>