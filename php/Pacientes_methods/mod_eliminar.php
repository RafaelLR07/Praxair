
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
                        <label for="numempleado">Razón</label>
                        <!--<textarea maxlength="100" style="height: 100px;" onkeyup="javascript:this.value = this.value.toUpperCase()"  value="" name="diagnostico" type="text" class="form-control" id="numempleado" placeholder="Razón de la baja" required></textarea>-->
                        <select name="opciones" id="opciones" class="form-control">
                           <option value="baja">BAJA</option> 
                           <option value="voluntaria">BAJA VOLUNTARIA</option> 
                           <option value="mejoria">BAJA DE MEJORIA</option> 
                           <option value="def">BAJA POR DEFUNCIÓN</option> 
                        </select>
                        

                    </div>

                    <div class="mejoria" id="mejoria" style="display: none;">

                        <div class="form-group">
                            <label for="numempleado">Diagnostico</label>
                            <textarea style="height: 100px;" maxlength="150" value="diagnostico" name="diagnostico" type="text" class="form-control" id="diagnostico" placeholder="Diagnostico"  onkeyup="javascript:this.value = this.value.toUpperCase()"></textarea>
                        </div>
                         
                        <div class="form-group">
                            <label for="indicaciones">Indicaciones</label>
                            <textarea style="height: 100px;" maxlength="150" value="indicaciones" name="indicaciones" type="text" class="form-control" id="numempleado" placeholder="Indicaciones"  onkeyup="javascript:this.value = this.value.toUpperCase()"></textarea>
                        </div>

                    </div>

                    <div class="voluntaria" id="voluntaria" style="display: none;">

                        <div class="form-group">
                            <label for="numempleado">Solicitador de baja</label>
                            <select name="solicitador" id="" class="form-control" >
                                <option value="paciente" selected>PACIENTE</option> 
                                <option value="fami">FAMILIAR REGISTRADO</option> 
                            </select>
                        </div>

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
                <!-- boton de prueba -->
                
			</div>
           

        </div>
    </div>
</div>

<script type="text/javascript">
    
    $('#opciones').on('change',function(){
        let valor = $(this).val();
        if(valor==="mejoria"){
            $('#voluntaria').css('display','none');
            $('#mejoria').css('display','block');
            $('#mejoria').fadeIn();
            


        }if(valor==="voluntaria"){
            $('#mejoria').css('display','none');
            $('#voluntaria').css('display','block');

            

        }
        if(valor==="baja"||valor==="def"){
            $('#mejoria').css('display','none');
            $('#voluntaria').css('display','none');

            

        }

       
    })


    function saludar(argument) {
        alert("saludar");
    }
</script>