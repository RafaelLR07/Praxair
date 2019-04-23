
<?php
    include_once('../../Scripts/DBconexion.php');  
    include_once('../../Visor/fechas.php');  
    include 'template_fac.php';
    
    $database = new Connection();
    $db = $database->open();
    
    $oxi_val = "";
    
    ?>

    <?php 
         $getPacien = "SELECT pacientes.nombre AS nombre, pacientes.cedula AS cedula,altas.fecha_alta AS alta,pacientes.calle AS calle, pacientes.numero_exterior AS numero,pacientes.colonia AS colonia,pacientes.cp AS cp, pacientes.municipio AS municipio 
    FROM pacientes INNER JOIN altas 
    WHERE pacientes.cedula=altas.cedula ORDER BY pacientes.nombre";


        $result_getPac = $db->query($getPacien);

                   
    header('Content-type:application/xls');
    header('Content-Disposition: attachment; filename=usuarios.xls');

     ?>

     <table border="1">
        <tr  style="background-color:pink;">
            <th>UNIDAD MEDICA</th> 
            <th>NOMBRE</th>
            <th>CEDULA</th>
            <th>ALTA</th>
            <th>DOMICILIO</th>
            <th>MEDICO</th>
            <th>DIAGNOSTICO</th>
        </tr>
        <?php 
        
        foreach ($result_getPac as $paciente) {
            $pacientee = $paciente['cedula'];
            $getMedic="SELECT medico,MAX(fecha), diagnostico FROM recetas WHERE paciente='$pacientee'";

            $result_getMed = $db->query($getMedic);
            foreach ($result_getMed as $medic);
            $medicoo = $medic['medico'];
            $get_med = "SELECT nombre FROM medicos WHERE no_empleado='$medicoo'";
            $res_med = $db->query($get_med);
            foreach ($res_med as $info_med);
                
            ?>
            <tr>
                <td><?php echo "CLINICA HOSPITAL XALAPA"; ?></td>
                <td><?php echo utf8_decode($paciente['nombre']); ?></td>
                <td><?php echo utf8_decode($paciente['cedula']); ?></td>
                <td><?php echo utf8_decode($paciente['alta']); ?></td>
                <td><?php echo utf8_decode($paciente['calle']." ".$paciente['numero']." ".$paciente['colonia']." ".$paciente['cp']." ".$paciente['municipio']);  ?></td>
                <td><?php echo utf8_decode($info_med['nombre']); ?></td>
                <td><?php echo utf8_decode($medic['diagnostico']); ?></td>
            </tr>
            <?php
        }

         ?>


    </table>

    

    ?>  