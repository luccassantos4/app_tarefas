<?php

session_start();
require_once "BD_conexao.php";

    if(!empty($_POST)){ //primeiro if
        
    $idTarefa = mysqli_real_escape_string($conn, trim($_POST['IDTAREFA']));
    $tituloTarefa = mysqli_real_escape_string($conn, trim($_POST['TITULO']));
    $tarefaDesc = mysqli_real_escape_string($conn, trim($_POST['TAREFADESCRI']));
    $tarefaStatus = mysqli_real_escape_string($conn, trim($_POST['TAREFASTATUS']));
    
    $conn->query("UPDATE tarefas SET TITULO = '$tituloTarefa', DESCRICAO = '$tarefaDesc', STATUS = '$tarefaStatus' WHERE IDTAREFA = '$idTarefa'");
    header("location: consultar_chamado.php");
    exit;
    

    } else { //fim do primeiro if
        echo 'error';
        exit;
    }  













?>