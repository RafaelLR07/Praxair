<!-- REGISTRO DE receta-->
<?php  //incluimos el fichero de conexion
              
  include_once('./Scripts/DBconexion.php');
  $fecha = strftime("%Y-%m-%d");
  $idd = $_REQUEST['id'];
  
    
      
      $name="";
      $no_user="";
      
      if(isset($_SESSION['u_usuario'])){
        $name = $_SESSION['u_usuario'];
        $no_user = $_SESSION['u_nouser'];
      }else{
        header("Location: ../index.php");
      }        
?>
<div class="modal fade" id="receta" role="dialog">
   
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Nueva Receta</h4>
        </div>
        <div class="modal-body">
            <form method="POST" action="./Recetas_methods/add_rec.php" >
            
              <input value="<?php echo $idd?>" name="idd" type="hidden" class="form-control" id="" placeholder="Numero de serie"  required>
            
              <div class="form-group">
                <label for="">Numero de serie</label>
                <input onkeyup="javascript:this.value = this.value.toUpperCase()" name="no_serie" type="text" class="form-control" id="" placeholder="Numero de serie"  required>
              </div>

              <div class="form-group">
                <label for="">Fecha</label>
                <input value="<?php echo $fecha?>" name="fecha" type="date" class="form-control" id="" placeholder="Fecha" readonly required >
              </div>
              <div class="form-group">
                  <label for="Suministro" class="col-sm-3 col-form-label col-form-label-lg">Suministro</label>
                  <div class="col-sm-9">
                      <select  name ="oxigeno" id="oxi" class="form-control" onchange="getOxi();" >
                        <option selected>Eliga tipo de oxigeno</option>
                        <?php
                         $database = new Connection();
                         $db = $database->open();
                         $consulta = 'SELECT * FROM oxigenos';
                         try{
                            foreach ($db->query($consulta) as $fila){
                              ?>
                              <option value="<?php  echo $fila['id_oxigenos']  ?>"><?php  echo $fila['tipo']."  $".$fila['precio'];  ?></option>  
                              <?php     
                            }


                          }catch(PDOException $e){
                            echo "Error en la consulta de tipo ". $e->getMessage(); 
                        }
                 ?>
                        
                      </select>
                  </div>
              </div>

              <div class="form-group">
                <label for="observaciones">Diagnostico:</label>
                <textarea onkeyup="javascript:this.value = this.value.toUpperCase()" maxlength="100" name="diagnostico" class="form-control" rows="3" ></textarea>
              </div>
              
   
            
              <!--
              ----------------------------------------------------------  
              <div class="form-group">
                <label for="observaciones">Indicaciones:</label>
                <textarea onkeyup="javascript:this.value = this.value.toUpperCase()" maxlength="100" name="indicaciones" class="form-control" rows="4" ></textarea>
              </div>
             -->
            <div class="general" id="general">
              <h4>Indicaciones</h4>
              <div class="form-group row">
                      <label for="Paterno" class="col-sm-4 col-form-label col-form-label-lg">Dosis por minuto</label>
                      <div class="col-sm-8">
                        <input name="litros" type="number"  class="form-control form-control-sm" id="dos_min" placeholder="Cantidad de litros" maxlength="20" required>
                      </div>
                    </div>
                  

                  <div class="form-group row">
                      <label for="dosis" class="col-sm-4 col-form-label col-form-label-lg">Hora de dosis</label>
                      <div class="col-sm-8">
                        <select name="dosis" class="form-control form-control-sm" id="hora_dosis" placeholder="Indicaciones" required>

                            <option value="" >Seleccione la parte del dia de aplicacion</option>  
                            <option value="continuo">Uso continuo</option>                
                            <option value="noche">En la noche</option>
                            <option value="mañana">En la mañana</option>
                            <option value="mañana&noche">Mañana y noche</option>
                        </select>
                      </div>
                  </div>
                 
                 <div class="form-group row">
                      <label for="tiempo" class="col-sm-4 col-form-label col-form-label-lg">Tiempo</label>
                      <div class="col-sm-8">
                        <input id="tiempo" name="tiempo" type="number" class="form-control form-control-sm" id="tiempo" placeholder="Cantidad de horas" maxlength="20" required>
                      </div>
                   </div>

          
            </div>

            <!-- CPAP ------------------------------------ BPAP   -->

            <div class="cpap" id="cpap" style="">
            <h4>CPAP BPAP</h4>
                <div class="form-group">
                  <label for=""> Rampa </label>
                  <input name="rampa" type="text" class="form-control" id="" placeholder="Rampa" required>
                </div>                            

                <div class="form-group">
                  <label for="cms"> CMS de agua </label>
                  <input name="cms" type="number" class="form-control" id="" placeholder="CMS" required>
                </div>

            </div>

            <!-------------------------------------------------------- -->
              <div class="form-group">
                <label for=""> Estado </label>
                <input name="estado" type="text" class="form-control" id="" placeholder="activo" readonly  required>
              </div>
              
              <div class="form-group">
                <label for="">Paciente</label>
                <input value="<?php echo $row['cedula']; ?>" name="paciente" type="text" class="form-control" id="" placeholder="Numero de serie"  required readonly>
              </div>
              
              <p id="p"></p>
              <div class="form-group">
                <label for="">Medico</label>
                <select onchange="" name ="medico" class="form-control" id="especialidad" > <?php echo $name; ?>
                        <option selected>Eliga medico</option>
                        <?php
              
              $consulta = 'SELECT * FROM medicos ORDER BY nombre ASC';
                try{
                 
                  foreach ($db->query($consulta) as $fila){

                    if($name == $fila['nombre']){
                    ?>
                    <option selected value="<?php  echo $fila['no_empleado']  ?>"><?php  echo $fila['nombre'] ?></option>  
                    <?php     
                    }else{
                      ?>
                       <option value="<?php  echo $fila['no_empleado']  ?>"><?php  echo $fila['nombre'] ?></option>  
                      <?php
                    }
                  }


                }catch(PDOException $e){
                  echo "Error en la consulta de tipo ". $e->getMessage(); 
                }
                
                  //Cerrar la Conexion
                $database->close();
                


              ?>

              </select>
              </div>
                
              

              <div class="btn-group col-lg-offset-8">
                <button class="btn btn-warning btn-group-lg">Limpiar</button>
                <button type="submit" class="btn btn-primary btn-group-lg">Registrar</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
 
  
  <script type="text/javascript">

    function getOxi() {
        let oxi_selected = parseInt(document.getElementById("oxi").value);

        switch(oxi_selected) {
              case 1:
                document.getElementById('general').style.display = 'block';
                document.getElementById('cpap').style.display = 'none';
                
                break;
              case 2:
                // code block
                document.getElementById('general').style.display = 'block';
                document.getElementById('cpap').style.display = 'none';
                break;

              case 3:
                document.getElementById('general').style.display = 'none';
                document.getElementById('cpap').style.display = 'block';
                break;

              case 4:
                document.getElementById('general').style.display = 'none';
                document.getElementById('cpap').style.display = 'block';
                break;

              case 5:
                document.getElementById('general').style.display = 'block';
                document.getElementById('cpap').style.display = 'block';
                break;

              case 6:
                document.getElementById('general').style.display = 'block';
                document.getElementById('cpap').style.display = 'block';
                break;

              case 7:
                document.getElementById('general').style.display = 'block';
                document.getElementById('cpap').style.display = 'block';
                break;

              case 8:
                document.getElementById('general').style.display = 'block';
                document.getElementById('cpap').style.display = 'block';
                break;
              default:
                // code block
            }

      }  



    
  </script>
  


  <!-- FIN -->


 