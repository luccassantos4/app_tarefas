<?php
     session_start();
    require_once "BD_conexao.php";

    $LOGIN = mysqli_real_escape_string($conn, trim($_POST['LOGIN']));
    $SENHA = mysqli_real_escape_string($conn, trim(md5($_POST['SENHA'])));
    $NOME = mysqli_real_escape_string($conn, trim($_POST['NOME']));


    $result = $conn->query("SELECT COUNT(*) FROM usuario WHERE LOGIN = '$LOGIN'");
    $row = $result->fetch_row();
    if ($row[0] > 0) { //VERIFICA SE O USUÁRIO JÁ ESTÁ CADASTRADO
        header("location: cadastrar_usuario.php");
    } else { //INSERIR USUÁRIO NO BANCO
        $conn->query("Insert into usuario (IDUSUARIO, LOGIN, SENHA, NOME) values ('','".$LOGIN."','".$SENHA."','".$NOME."')");
        header("location: index.php?login=success");
        exit;
    }
    
?>