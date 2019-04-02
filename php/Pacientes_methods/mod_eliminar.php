


<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $cedula_uni; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Dar de baja paciente</h4></center>
                
              
            </div>
            <div class="modal-body">	
            	<p class="text-center">¿Desea dar de baja al paciente?</p>
                <h3 class="text-center"><?php echo $fila['cedula'] ?></h2>
                <h3 class="text-center"><?php echo $fila['nombre'] ?></h2>
        				    
                        
                <form method="POST" action="./Pacientes_methods/borrar_pac.php?ido=<?php echo $no_user ;?>&id=<?php echo $fila['cedula']; ?>" >

                    <div class="form-group">
                        <label for="numempleado">Estado</label>
                        <select  name="estatus" type="text" class="form-control" id="estatus"  required>
                            <option value="INACTIVO">INACTIVO</option>
                            <option value="DEFUNCION">DEFUNCION</option>

                        </select>
                    </div>
    
                    <div class="form-group">
                        <label for="numempleado">Razón</label>
                        <textarea maxlength="100" style="height: 100px;" onkeyup="javascript:this.value = this.value.toUpperCase()"  value="" name="diagnostico" type="text" class="form-control" id="numempleado" placeholder="Razón de la baja" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="numempleado">Indicaciones</label>
                        <textarea style="height: 100px;" maxlength="150" value="" name="indicaciones" type="text" class="form-control" id="numempleado" placeholder="Indicaciones" required onkeyup="javascript:this.value = this.value.toUpperCase()"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="numempleado">Fecha de la baja</label>
                        <input value="" name="fecha_doun" type="date" class="form-control" id="fecha_doun" required/>
                    </div>
                     
                     <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                 <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Si </button>
            </div>
                </form>





			</div>
           

        </div>
    </div>
</div>