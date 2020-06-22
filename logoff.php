<?php
    session_start();

    //remover indices do array da sessão 
    //unset() // remove o indices apenas se ele existir 

    //ou

    //destruir a variação da sesssão
    //session_destroy


    session_destroy(); // exclui cabou, somente fazendo uma nova requisição 
    header('Location: index.php');
?>