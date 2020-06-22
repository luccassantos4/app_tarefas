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
    <!--Jquery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
              Editar Cadastro
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">

                <?php
             
                  $resultado_query = "SELECT *
                  from usuario where IDUSUARIO = $ID";
                  $resultado_usuario = mysqli_query($conn, $resultado_query);
                  $row_resultado_usuario = mysqli_fetch_assoc($resultado_usuario)
                
                ?>
                  <form id="cadastro" action="" method="POST">  
                    <div class="form-group">
                      <label>Nome</label>
                      <input type="text" name="NOME" class="form-control" value="<?= $row_resultado_usuario['NOME'] ?>" placeholder="Nome">
                    </div>
                    
                    <div class="row">
                            <div class="col-6">  <!-- inicio col-6-->
                                    <div class="form-group">
                                    <label>Email:</label>
                                    <input type="text" name="LOGIN" class="form-control" value="<?= $row_resultado_usuario['LOGIN'] ?>" placeholder="E-mail">
                                    </div>
                            </div><!-- fim col-6-->

                            <div class="col-6"> <!-- inicio col-6-->

                                    <div class="form-group">
                                    <label>Senha:</label>
                                    <input type="password" name="SENHA" class="form-control" placeholder="Senha">
                                    </div>

                            </div><!-- fim col-6-->
                            
                      
                    </div>

                    <center><DIV id="menssage"></DIV></center>
                

                    <div class="row mt-5">
                      <div class="col-6">
                      
                        <a class="btn btn-lg btn-warning btn-block" href="home.php" type="button">Voltar</a>
                        
                      </div>

                      <div class="col-6">
                        <button class="btn btn-lg btn-info btn-block" type="submit">Atualizar Cadastro</button>
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

  <script type="text/javascript">

        $('#cadastro').submit(function(){              
          var dados = $( this ).serialize();

        $.ajax({
          type: "post",
          data: dados,
          url: "proc_atualizar_usuario.php?id=<?= $_SESSION['IDUSUARIO'] ?>",
          success: function( data )
          {
            if(data == 'success'){
              document.getElementById('menssage').innerHTML = '<div class="text-success text-center">Usuário atualizado com sucesso!</div>';
            } else {
              document.getElementById('menssage').innerHTML = '<div class="text-danger text-center">Erro ao atualizar usuário!</div>';
            }
          }
        });
        
        return false;
      });

	</script>
</html>