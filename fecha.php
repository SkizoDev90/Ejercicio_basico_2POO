<?php
    class Fecha{
        public $fecha;
        public function __construct($fecha) {
            $this->fecha = $fecha;
        }

        public function mostrar(): void{
            $meses = [
                1=>["nombre"=>"Enero", "dias"=>31],
                2=>["nombre"=>"Febrero","dias"=>28],
                3=>["nombre"=>"Marzo","dias"=>31],
                4=>["nombre"=>"Abril","dias"=>30],
                5=>["nombre"=>"Mayo","dias"=>31],
                6=>["nombre"=>"Junio","dias"=>30],
                7=>["nombre"=>"Julio","dias"=>31],
                8=>["nombre"=>"Agosto","dias"=>31],
                9=>["nombre"=>"Septiembre","dias"=>30],
                10=>["nombre"=>"Octubre","dias"=>31],
                11=>["nombre"=>"Noviembre","dias"=>30],
                12=>["nombre"=>"Diciembre","dias"=>31]
                ];

            $arrayFecha=explode("-",$this->fecha);  //paso la fecha a un array

            if($this->comprobar($arrayFecha[0])){   //comprobamos si es bisiesto para saber si cambiar el array
                $this->cambiarArray($meses);
            }

            foreach ($meses as $indice => $value) {
                if ($indice == $arrayFecha[1]) {                                    // si el índice coincide con el mes...
                    $arrayFecha[1] = $value["nombre"];                              // cambiamos el número por el nombre
                    $salida = implode("/", $arrayFecha);          // volvemos el array un string
                    
                    if ($this->comprobar($arrayFecha[0]) && $value["nombre"] == "Febrero") {
                        echo $salida . "<br> Es bisiesto y tiene " . $value["dias"] . " días";
                    } else if ($this->comprobar($arrayFecha[0]) && $value["nombre"] != "Febrero") {
                        echo $salida . "<br> Es bisiesto y este mes tiene " . $value["dias"] . " días" . " y ".$meses[2]["nombre"]." tiene ".$meses[2]["dias"]." dias";
                    } else if(!$this->comprobar($arrayFecha[0])){
                        echo $salida . "<br> No es bisiesto y este mes tiene " . $value["dias"] . " días" . " y ".$meses[2]["nombre"]." tiene ".$meses[2]["dias"]." dias";
                    }
                }
            }
        }
        private function cambiarArray(&$meses){
            $meses[2]["dias"]=29;
        }
        private function comprobar($anio): bool{
            if($anio%4 == 0 && $anio % 100 != 0 || ($anio % 400 == 0)){
                return true;    //si es bisiesto devuelve true
            }else{
                return false;   //sino es bisiesto....
                
            }
        }
    }
?>