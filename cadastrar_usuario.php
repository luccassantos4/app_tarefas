<?php

  session_start();

?>


<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="img/list.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Tarefas
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Cadastrar usuário
            </div>
            <div class="card-body">
              <form action="proc_cadastrar_usuario.php" method="post">
                <div class="form-group">
                  <input name="LOGIN" type="email" class="form-control" placeholder="E-mail" required>
                </div>
                <div class="form-group">
                  <input name="SENHA" type="password" class="form-control" placeholder="Senha" required>
                </div>
                <div class="form-group">
                  <input name="NOME" type="text" class="form-control" placeholder="Nome Completo" required>
                </div>

                <a href="cadastrar_usuario.php"><button type="submit" class="btn btn-lg btn-info btn-block mt-3">Cadastre-se</button></a> 
              </form>

              <a href="index.php"><button class="btn btn-lg btn-dark btn-block" >Cancelar</button></a>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>