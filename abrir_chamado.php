<?php

  require "validador_acesso.php";
  require "BD_conexao.php";
  

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>Tarefa</title>

    <!--Bootstrap css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="global.css">

    <style>
      .card-abrir-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img  src="img/list.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Lista de Tarefas
      </a>
      <ul class="navbar-nav">
      <li class="nav-item">
      <a href="logoff.php" class="nav-link btn-">Sair</a>
      </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-abrir-chamado">
          <div class="card">
            <div class="card-header">
              Abertura de Tarefa
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  
                  <form action="proc_cadastrar_tarefa.php" method="POST">
                    <div class="form-group">
                      <label>Título</label>
                      <input type="text" name="TITULO" class="form-control" placeholder="Título">
                    </div>
                    
                    <div class="form-group">
                      <label>Descrição</label>
                      <textarea class="form-control" name="DESCRICAO" rows="3"></textarea>
                    </div>

                    <div class="row"> <!-- inicio da ROW 1-->
                        <div class="col-6">

                      <label>Data e hora de inicío</label>
                      <input type="date" name="DATAINICIO" class="form-control">

                        </div>

                        <div class="col-6">

                      <label>Data e hora de término</label>
                      <input type="date" name="DATATERMINO" class="form-control">

                        </div>

                    </div><br> <!-- fechamento da ROW 1-->

                    <div class="row"> <!-- inicio da ROW 2-->
                        <div class="col-6"> <!--col-6-->

                        <div class="form-group">
                                <label>Status</label>
                                    <select class="form-control text-center" name="STATUS">
                                        <option value="ATIVO">Ativo</option>
                                        <option value="PENDENTE">Pendente</option>
                                        <option value="INATIVO">Inativo</option>
                                    </select>
                              </div>

                        </div> <!--col-6-->

                        <div class="col-6"> <!--col-6-->

                            <div class="form-group">
                                <label>Atribuir Tarefa para:</label>
                                    <select class="form-control text-center" name="USUARIO">
                                        
                                        <?php
                                        $resultado_query = "SELECT * from usuario ORDER BY IDUSUARIO DESC";
                                        $resultado_usuario = mysqli_query($conn, $resultado_query);
                                        while($row_resultado_usuario = mysqli_fetch_assoc($resultado_usuario)){ ?>
                                        <option value="<?php echo $row_resultado_usuario['IDUSUARIO']; ?>"><?php echo $row_resultado_usuario['NOME']; ?>
                                        </option><?php
                                        }
                                        ?>
                                    </select>
                              </div>

                        </div>  <!--col-6-->

                    </div> <!-- fechamento da ROW 2-->
                    
                    <?php if(isset($_GET['tarefa']) && $_GET['tarefa'] == 'success'){ ?>

                      <div class="text-success text-center">
                      Tarefa cadastrada com sucesso
                      </div>

                          <?php } ?>

                    <?php if(isset($_GET['tarefa']) && $_GET['tarefa'] == 'fail'){ ?>

                      <div class="text-danger text-center">
                      Tarefa não foi cadastrar com sucesso
                      </div>

                          <?php } ?>

                    <div class="row mt-5">
                      <div class="col-6">
                      
                        <a class="btn btn-lg btn-warning btn-block" href="home.php" type="submit">Voltar</a>
                        
                      </div>

                      <div class="col-6">
                        <button class="btn btn-lg btn-info btn-block" type="submit">Abrir</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>