<?php
  
  require_once "validador_acesso.php";
  require "BD_conexao.php";

?>

<html>

<head>
  <meta charset="utf-8" />
  <title>App Help Desk</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!--Jquery-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <style>
    .card-consultar-chamado {
      padding: 30px 0 0 0;
      width: 100%;
      margin: 0 auto;
    }
  </style>


</head>

<body>

  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="img/list.png" width="30" height="30" class="d-inline-block align-top" alt="">
      Lista de tarefas
    </a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="logoff.php" class="nav-link">Sair</a>
      </li>
    </ul>
  </nav>

  <div class="container">
    <div class="row">

      <div class="card-consultar-chamado">
        <div class="card">
          <div class="card-header">
            Lista de Tarefas
          </div>

          <?php
             
             $resultado_query = "SELECT IDUSUARIO, NOME, IDTAREFA, TITULO,DESCRICAO, DATAINICIO, DATATERMINO, STATUS
             from usuario INNER JOIN tarefas on IDUSUARIO = ID_USUARIO where IDUSUARIO = $ID";
             $resultado_usuario = mysqli_query($conn, $resultado_query);
            
             ?>


          <div class="card-body">
            <!-- inicio card-body-->
            <?php  while($row_resultado_usuario = mysqli_fetch_assoc($resultado_usuario)){ ?>

            <div class="card mb-3 bg-light">
              <!--inicio card mb-3-->
              <div class="card-body" id="elemento-pai">

                <strong>
                  <h5 class="card-title">Tarefa:
                </strong> <?php echo $row_resultado_usuario['TITULO']; ?></h5>
                <strong>
                  <p class="card-text">Descrição da tarefa:
                </strong> <?php echo $row_resultado_usuario['DESCRICAO']; ?></p>

                <div class="row">
                  <!--inicio row-->

                  <div class="col-4">
                    <strong>
                      <p>Data e hora de início:
                    </strong> <?php echo $row_resultado_usuario['DATAINICIO']; ?></p>
                  </div>

                  <div class="col-4">
                    <strong>
                      <p>Data e hora de término:
                    </strong> <?php echo $row_resultado_usuario['DATATERMINO']; ?></p>
                  </div>

                </div>
                <!--fim row-->

                <strong>
                  <p>Tarefa atribuída para:
                </strong><?php echo $row_resultado_usuario['NOME']; ?></p>

                <strong>
                  <p>Status:
                </strong><?php echo $row_resultado_usuario['STATUS']; ?></p>

                 <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#Edit1"
                  data-idtarefa="<?php echo $row_resultado_usuario['IDTAREFA']; ?>"
                  data-tarefa="<?php echo $row_resultado_usuario['TITULO']; ?>"
                  data-descricao="<?php echo $row_resultado_usuario['DESCRICAO']; ?>"
                  data-status="<?php echo $row_resultado_usuario['STATUS']; ?>"
                  data-nome="<?php echo $row_resultado_usuario['NOME']; ?>">Atualizar Tarefas</button>
          

                  <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#Deletar"
                  data-idtarefa="<?php echo $row_resultado_usuario['IDTAREFA']; ?>"
                  data-tarefa="<?php echo $row_resultado_usuario['TITULO']; ?>"
                  data-descricao="<?php echo $row_resultado_usuario['DESCRICAO']; ?>"
                  data-nome="<?php echo $row_resultado_usuario['NOME']; ?>">Excluir tarefas</button>




              </div>
            </div>
            <!--fim card mb-3-->
            <?php
             }
             ?>


            <div class="row mt-5">
              <div class="col-6">
                <a href="home.php">
                  <button class="btn btn-lg btn-warning btn-block" type="submit">Voltar</button>
                </a>
              </div>
            </div>
          </div> <!-- fim card-body-->

        </div>
      </div>
    </div>
  </div>

    


   <!-- Modal -->
  <div class="modal fade" id="Deletar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"> <!--modal deletar-->
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
			  <h5 class="modal-title text-center" id="exampleModalLabel">Tem certeza que deseja excluir a tarefa atribuída para: </h5>
				<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">&times;</span></button>
			  </div>

			  <div class="modal-body"> 
				<form  action="proc_delete_tarefa.php" method="POST">
				  <div class="form-group">

          <input name="IDTAREFA" type="hidden" class="form-control" id="idtarefa">

					<label class="control-label">Tarefa:</label>
          <input  type="text" class="form-control" id="tarefanome" disabled="disabled">
          
					<label class="control-label">Descrição:</label>
					<textarea type="text" class="form-control" id="descricaotarefa" disabled="disabled"></textarea>
				  </div>
				
				<button type="button" class="btn btn-outline-success" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-outline-info">Excluir tarefa</button>
			 
				</form>
			  </div>
			  
			</div>
		  </div>
    </div><!--modal deletar-->
    

    

    <!-- Modal -->
<div class="modal fade" id="Edit1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!--inicio modal atualizar tarefa-->
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addLabel">Atualizar Tarefa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="proc_atualizar_tarefa.php" method="POST">
          <div class="modal-body">

            <label for="tarefa_atri">Tarefa atribuída para:</label>
            <input type="text" id="tarefa_atri" class="form-control" disabled>

            <input type="hidden" name="IDTAREFA" id="id_tarefa" class="form-control">

            <label for="nome_tarefa">Tarefa: </label>
            <input type="text" name="TITULO" id="nome_tarefa" class="form-control">

            <label for="tarefa_descri">Descrição:</label>
            <textarea type="text" name="TAREFADESCRI" id="tarefa_descri" class="form-control"></textarea>
            
            <label for="tarefa_status">Status: </label>
            <input type="text" name="TAREFASTATUS" id="tarefa_status" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-outline-success">Atualizar Tarefa</button>
          </div>
        </form>
      </div>

    </div>
    <!--fim modal atualizar tarefa-->

    



 
    




  


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="js/modal.js"></script>

</body>

</html>


