<?php
     session_start();
    require_once "BD_conexao.php";

    if(!empty($_POST)){ 

    $NOME = mysqli_real_escape_string($conn, trim($_POST['NOME']));
    $LOGIN = mysqli_real_escape_string($conn, trim($_POST['LOGIN']));
    $SENHA = md5(mysqli_real_escape_string($conn, trim($_POST['SENHA'])));

    $ID = $_GET['id'];
    
        if($_POST['SENHA'] == ''){
            $conn->query("UPDATE usuario SET NOME = '$NOME', LOGIN = '$LOGIN' WHERE IDUSUARIO = '$ID'");
        } else {
            $conn->query("UPDATE usuario SET NOME = '$NOME', LOGIN = '$LOGIN', SENHA = '$SENHA' WHERE IDUSUARIO = '$ID'");
        }
        
        echo 'success';
        exit;

    } else { 
        echo 'error';
        exit;
    }  
?>