
<div class="container">
  <div class="row">
    <div class="col-lg-5 col-lg-offset-1">
      <div class="input-group">
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#regismedico">
            <span class="glyphicon glyphicon-plus"></span> Nuevo Medico
        </button>
      </div>
    </div>
    <div class="">
      <div class="col-lg-3">
        <div class="input-group">
          <span class="input-group-btn">
          <input type="text" class="form-control" placeholder="Buscar" >
          <button class="btn btn-info btn-lg" type="button">
          <span class="glyphicon glyphicon-search"></span> Consultar
          </button>
          <button class="btn btn-warning btn-lg" type="button">
              <span class="glyphicon glyphicon-minus-sign"></span> Limpiar
          </button> 
          </span>                             
        </div>      
      </div>  
    </div>
  </div>
  <br>
  <div class="col-xs-12">
    <div class="row">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr class="table-bordered">
              <td >Num Empleado      </td>
              <td >Nombre completo   </td>
              <td >Especialidad      </td>
              <td >Acción            </td>
            </tr>
          </thead>
          <tbody>
                
      <?php
      //incluimos el fichero de conexion
      include_once('Scripts/DBconexion.php');

      $database = new Connection();
      $db = $database->open();
      try{  
        $sql = 'SELECT * FROM medicos';
        $sl = 'SELECT * FROM especialidades';
    
        foreach ($db->query($sql) as $row) {
          ?>
          <tr>
            <td><?php echo $row['no_empleado']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
              <?php 
              foreach($db->query($sl) as $fila){
                if($fila['id_especialidad'] == $row['especialidad']){?>
                  <td><?php echo $fila['especialidad']; ?></td>
                <?php  
                }
              }
              ?>
            
            <td>

            <a href="#edit_<?php echo $row['no_empleado']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Editar</a>
            <a href="#delete_<?php echo $row['no_empleado']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Borrar</a>  
            </td>
            <?php include('borrar_editar_mod.php'); ?>
          </tr>
          <?php 
        }
      }
      catch(PDOException $e){
        echo "Hubo un problema en la conexión: " . $e->getMessage();
      }

      //Cerrar la Conexion
      $database->close();

    ?>  
 



              
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

  <!-- Navegacion del usuario administrador del sistema PRAXAIR-->
    <?php include "Modales_bajas.php"; ?>       
  <!-- Fin-->






