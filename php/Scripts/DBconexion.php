<?php
$mysqli= new mysqli("localhost","root","","praxair"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos

if(mysqli_connect_errno()){
	echo 'Conexion Fallida : ', mysqli_connect_error();
	exit();
}
$acentos = $mysqli->query("SET NAMES 'utf8'");

Class Connection{
 
	private $server = "mysql:host=localhost;dbname=praxair_v2";
	private $username = "root";
	private $password = "";
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\'');
	protected $conn;
 	
	public function open(){
 		try{
           $this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
 			return $this->conn;
 		}
 		catch (PDOException $e){
 			echo "Hubo un problema con la conexión: " . $e->getMessage();
 		}
 
    }
 
	public function close(){
   		$this->conn = null;
 	}
 
}
 
?>