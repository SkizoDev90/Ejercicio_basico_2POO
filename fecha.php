<?php
    class Fecha{
        public $fecha;
        public function __construct($fecha) {
            $this->fecha = $fecha;
        }
        public function mostrar($meses): void{
            $arrayFecha = [];
            $arrayFecha=explode("-",$this->fecha);  //paso la fecha a un array
            foreach ($meses as $indice=>$value) {
                if($indice+1 == $arrayFecha[1]){                        //si el indice del array +1 coincide con el mes que se recoje.....
                    $arrayFecha[1]=$value[0];                           //cargamos en el mes el string correspondiente
                    if($this->comprobar($arrayFecha[0]) && $arrayFecha[1]=="Febrero"){          //pasamos a comprobar si es bisiesto y febrero
                        $salida=implode("/",$arrayFecha);                           //volvemos el array un string
                        echo $salida."<br>"."Es bisiesto y tiene ".($value[1]+1)." dias";    
                    }else if(!$this->comprobar($arrayFecha[0])){    //y si no es bisitesto....
                        $salida=implode("/",$arrayFecha);
                        echo $salida."<br>"."No es bisiesto y tiene ".$value[1]."dias";
                    };
                }
            }
        }
        private function comprobar($anio): bool{
            if($anio%4 == 0 && $anio%100 != 0 || ($anio%400 == 0)){
                return true;    //si es bisiesto devuelve true
            }else{
                return false;   //sino es bisiesto....
                
            }
        }
    }
?>