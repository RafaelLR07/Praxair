<?php
	/**
	* 
	*/
	class funciones_varias 
	{
		
		function __construct()
		{
			# code...
        }
    
        public function obtener_fecha2($date){
            list($anio, $mess, $dia) = explode("-", $date);
            $dias = array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo");
            $mes = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            $fecha = $dia ." de ".$mes[$mess-1] ." del ". $anio;
            return $fecha;

        }       

         public function getMonth($date){
            list($anio, $mess, $dia) = explode("-", $date);
            
            
            $mes = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

            $fecha = $mes[$mess-1] ." del ". $anio;
            return $fecha;

        }


        public function obtener_fecha(){
        	date_default_timezone_set('America/Mexico_City');
            $dias = array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo");
            $mes = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            $fecha = " Xalapa, Ver. a ".$dias[date("w")-1] . " , " .date("d") ." de ".$mes[date("m")-1] ." del ". date("Y");
            return $fecha;

        }

         public function get_init_month($date)
        {

            list($anio, $mes, $dia) = explode("-", $date);
            return $fecha_com = $anio.'-'.$mes.'-'.'01';  
        }


        public function getDiasFac($date1,$date2){
            
            list($anio, $mes, $dia) = explode("-", $date1);
            list($anio2, $mes2, $dia2) = explode("-", $date2);

            $diff = ((int)$dia2)-((int)$dia);
            /*if(((int)$diff)){

            }*/
            return $diff+1;

        }

        public function getOneday($date)
        {
            $fecha = $date;
            list($anio, $mes, $dia) = explode("-", $fecha);
            $valor = ((int)$dia)+1;
            $valor_res = $valor;
            $dias_mes = $this->get_days_month($mes,$anio);

            if($valor_res>=$dias_mes){
                $valor_res = $dias_mes;
            }

            if($valor<10){
                $valor_res = '0'.$valor;  
            }
            return $fecha_com = $anio.'-'.$mes.'-'.$valor_res;  
            


        }

        public function get_days_month($mes, $anio)
        {
             if($mes==1 || $mes==3 ||$mes==5 ||$mes==7 ||$mes==8 ||$mes==10 ||$mes==12){
                
                    $val_fech = 31;
                    return $val_fech;
                    
                

            }elseif ($mes==4 ||$mes==6 ||$mes==9 ||$mes==11) {
                
                $val_fech = 30;
                return $val_fech;

            }elseif ($mes==2) {
                //año bisciesto
                if($anio%4==0){
                    $val_fech = 29;
                    return $val_fech;
                }else{
                    $val_fech = 28;
                    return $val_fech;
                    
                }
            }
        }

        public function getFin($dates)
        {
            
            list($anio, $mes, $dia) = explode("-", $dates);
            
            if($mes==1 || $mes==3 ||$mes==5 ||$mes==7 ||$mes==8 ||$mes==10 ||$mes==12){
                
                    $val_fech = $anio.'-'.$mes.'-'.'31';
                    return $val_fech;
                    
                

            }elseif ($mes==4 ||$mes==6 ||$mes==9 ||$mes==11) {
                
                $val_fech = $anio.'-'.$mes.'-'.'30';
                return $val_fech;

            }elseif ($mes==2) {
                //año bisciesto
                if($anio%4==0){
                    $val_fech = $anio.'-'.$mes.'-'.'29';
                    return $val_fech;
                }else{
                    $val_fech = $anio.'-'.$mes.'-'.'28';
                    return $val_fech;
                    
                }
            }
        }

        public function final_mes($value)
        {
        	$fecha =  $value;
        	list($anio, $mes, $dia) = explode("-", $fecha);
        	
        	if($mes==1 || $mes==3 ||$mes==5 ||$mes==7 ||$mes==8 ||$mes==10 ||$mes==12){
        		
	        		$val_fech = $anio.'/'.$mes.'/'.'31';
	        		return $val_fech;
        			
        		

        	}elseif ($mes==4 ||$mes==6 ||$mes==9 ||$mes==11) {
        		
	        	$val_fech = $anio.'/'.$mes.'/'.'30';
        		return $val_fech;

        	}elseif ($mes==2) {
                //año bisciesto
        		if($anio%4==0){
        			$val_fech = $anio.'/'.$mes.'/'.'29';
	        		return $val_fech;
        		}else{
	        		$val_fech = $anio.'/'.$mes.'/'.'28';
	        		return $val_fech;
        			
        		}
        	}
        }

    }


?>
