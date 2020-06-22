<?php
    session_start();
    require_once "BD_conexao.php";


    if((isset($_POST['LOGIN'])) && (isset($_POST['SENHA']))){ 
        
        $LOGIN = mysqli_real_escape_string($conn, $_POST['LOGIN']);
		$SENHA = mysqli_real_escape_string($conn, $_POST['SENHA']);
		$SENHA = md5($SENHA);
        

        //query fornecedor
        $query2 = "SELECT * FROM usuario WHERE LOGIN = '$LOGIN' AND SENHA = '$SENHA'";
		$resultado_query2 = mysqli_query($conn, $query2);
        $resultado = mysqli_fetch_assoc($resultado_query2);

        if(isset($resultado)){
            $usuario_id = $resultado['IDUSUARIO'];
            $_SESSION['autenticado'] = 'SIM';
            $_SESSION['IDUSUARIO'] = $usuario_id;
            header('Location: home.php');
            exit;
            
        }else{
            $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro');
        }
        
        
    }







?>