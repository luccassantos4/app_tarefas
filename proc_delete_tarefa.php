<?php

session_start();
require_once "BD_conexao.php";

    if(!empty($_POST)){ //primeiro if
        
    $idTarefa = mysqli_real_escape_string($conn, trim($_POST['IDTAREFA']));
    
    $conn->query("DELETE from tarefas WHERE IDTAREFA = '$idTarefa'");
    header("location: consultar_chamado.php");
    exit;
    

    } else { //fim do primeiro if
        echo 'error';
        exit;
    }  






?>