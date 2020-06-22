<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "app_tarefas";

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname) or die ('Não foi possivel conectar ao BD');
$conn->set_charset("utf8");

if(mysqli_connect_error()):
	echo "Falha na conexão: ".mysqli_connect_error();
endif;



?>