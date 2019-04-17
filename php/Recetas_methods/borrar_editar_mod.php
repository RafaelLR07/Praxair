<?php 
  include_once('../Scripts/DBconexion.php');
  $database = new Connection(); 
?> 

<div class="modal fade" id="edit_<?php echo $fila['id_recetas']; ?>" role="dialog">
     <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">Editar Receta</h4>
        </div>
        <div class="modal-body">
            <form method="POST" action="./Recetas_methods/update_rect.php" >
              
              <!-- cedula de paciente -->
              <input value="<?php echo $fila['paciente'];?>" name="idPac" type="hidden" class="form-control" id="" placeholder="Numero de serie"  required>

               <input value="<?php echo $fila['id_recetas'];?>" name="idRec" type="hidden" class="form-control" id="" placeholder="Numero de serie" required/>
            
              <div class="form-group">
                <label for="">Numero de serie</label>
                <input value="<?php echo $fila['serie'];?>" onkeyup="javascript:this.value = this.value.toUpperCase()" name="no_serie" type="text" class="form-control" id="" placeholder="Numero de serie" required>
              </div>

              <div class="form-group">
                <label for="">Fecha</label>
                <input value="<?php echo $fila['fecha']; ?>" name="fecha" type="date" class="form-control" id=""  required >
              </div>
              <div class="form-group">
                  <label for="Suministro" class="col-sm-3 col-form-label col-form-label-lg">Suministro</label>
                  <div class="col-sm-9">
                      <select  name ="oxigeno" id="oxi" class="form-control" onchange="getOxi();" >
                        <option selected>Eliga tipo de oxigeno</option>
                        <?php
                         $consulta = 'SELECT * FROM oxigenos';
                         try{
                            foreach ($db->query($consulta) as $fill_oxi){
                              if($fila['oxigeno']==$fill_oxi['id_oxigenos']){
                                ?>
                                 <option value="<?php  echo $fill_oxi['id_oxigenos']  ?>" selected><?php  echo $fill_oxi['tipo']."  $".$fill_oxi['precio'];  ?></option>  
                                <?php
                              }else{
                              ?>
                              <option value="<?php  echo $fill_oxi['id_oxigenos']  ?>"><?php  echo $fill_oxi['tipo']."  $".$fill_oxi['precio'];  ?></option>  
                              <?php 
                              }    
                            }


                          }catch(PDOException $e){
                            echo "Error en la consulta de tipo ". $e->getMessage(); 
                        }
                 ?>
                        
                      </select>
                  </div>
              </div>

              <div class="form-group">
                <label for="diagnostico">Diagnostico:</label>
                <textarea onkeyup="javascript:this.value = this.value.toUpperCase()" maxlength="100" name="diagnostico" class="form-control" rows="3" ><?php echo $fila['diagnostico'];?></textarea>
              </div>
              
   
            
              <!--
              ----------------------------------------------------------  
              <div class="form-group">
                <label for="observaciones">Indicaciones:</label>
                <textarea onkeyup="javascript:this.value = this.value.toUpperCase()" maxlength="100" name="indicaciones" class="form-control" rows="4" ></textarea>
              </div>
             -->
            
                   <div class="form-group">
                      <label for="diagnostico">Indicaciones:</label>
                      <textarea onkeyup="javascript:this.value = this.value.toUpperCase()" maxlength="100" name="indicaciones" class="form-control" rows="3" ><?php echo $fila['indicaciones'];?></textarea>
                   </div>
              
                   
                  
                    <?php 
                    //Lo usare en el primer receta
                      /*$palabra = "1 litro / cada 2 horas es necesario / aplicarlo bien";
                      $palabra = $fila['indicaciones'];
                      $verdad = strpos($palabra, "/"); 
                      if($verdad){
                       list( $litros, $aclara,$tiempo  ) = explode("/", $palabra);
                       echo $litros." OO  ".$aclara." OO ".$tiempo;
                      }else{
                        echo $palabra;
                      }*/
                    ?>
               

          

            <!-------------------------------------------------------- -->
              <!-- <div class="form-group">
                <label for=""> Estado </label>
                <input name="estado" type="text" class="form-control" id="" placeholder="activo" readonly  required>
              </div> -->
              
              <div class="form-group">
                <label for="">Paciente</label>
                <input value="<?php echo $fila['paciente']; ?>" name="paciente" type="text" class="form-control" id="" placeholder="Numero de serie"  required readonly>
              </div>
              
              <p id="p"></p>
              <div class="form-group">
                <label for="">Medico</label>
                <select onchange="" name ="medico" class="form-control" id="especialidad" > 
                  <option selected>Eliga medico</option>
                     <?php
              
                      $consulta = 'SELECT * FROM medicos ORDER BY nombre ASC';

                        try{
                         
                          foreach ($db->query($consulta) as $fill_med){
                            $fila['no_empleado'];

                            if( $fila['medico'] == $fill_med['no_empleado']){
                            ?>
                            <option selected value="<?php  echo $fill_med['no_empleado']  ?>"><?php  echo $fill_med['nombre'] ?></option>  
                            <?php     
                            }else{
                              ?>
                               <option value="<?php  echo $fill_med['no_empleado']  ?>"><?php  echo $fill_med['nombre'] ?></option>  
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
                 <button type="submit" class="btn btn-primary btn-group-lg">Actualizar</button>
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