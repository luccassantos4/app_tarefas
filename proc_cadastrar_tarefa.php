<?php
     session_start();
    require_once "BD_conexao.php";

    if((!empty($_POST['TITULO'])) && (isset($_POST['DESCRICAO']))){ 

   $TITULO = mysqli_real_escape_string($conn, trim($_POST['TITULO']));
   $DESCRICAO = mysqli_real_escape_string($conn, trim($_POST['DESCRICAO']));
   $DATAINICIO = mysqli_real_escape_string($conn, trim($_POST['DATAINICIO']));
   $DATATERMINO = mysqli_real_escape_string($conn, trim($_POST['DATATERMINO']));
   $USUARIO = mysqli_real_escape_string($conn, trim($_POST['USUARIO']));
   $STATUS = mysqli_real_escape_string($conn, trim($_POST['STATUS']));
  

    //INSERIR TAREFA NO BANCO
    $conn->query("Insert into tarefas (IDTAREFA, TITULO, DESCRICAO, DATAINICIO, DATATERMINO, ID_USUARIO, STATUS) 
    values ('','".$TITULO."','".$DESCRICAO."','".$DATAINICIO."','".$DATATERMINO."','".$USUARIO."','".$STATUS."')");
    header("location: abrir_chamado.php?tarefa=success");
    exit;
    

    }else { 
        header("location: abrir_chamado.php?tarefa=fail");
        exit;
    }       
?>