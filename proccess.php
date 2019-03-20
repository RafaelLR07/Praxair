<?php

session_start();
$usuario = $_POST['usuario'];
$password = $_POST['contra'];

include("php/Scripts/DBconexion.php");
$database = new Connection();
$db = $database->open();

$sql = ("SELECT * FROM usuarios WHERE no_empleado='$usuario' AND pass='$password'");
$valor1 = "";
$valor2 = "";
$no_user = "";
$rol="";
foreach ($db->query($sql) as $rows) {
    $valor1 = $rows['nombre'];
    $valor2 = $rows['pass'];
    $no_user = $rows['no_empleado'];
    $rol = $rows['tipo_usuario'];
    

}



if($usuario == $no_user && $password==$valor2){
    $_SESSION['u_usuario'] = $valor1;
    $_SESSION['u_nouser'] = $no_user;
    $_SESSION['u_rol'] = $rol;
    header("Location: php/Index.php");
}else if($usuario != $valor1 || $password!=$valor2){
    
    echo "<script>".'alert("Usuario o contraseña invalidos");'."</script>";
    echo "<script>".'location.href=("index.php");'."</script>";
    
        
    
   // 
}
//echo "<script>".'alert("Usuario o contraseña invalidos");'."</script>";






?>