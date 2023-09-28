<?php
    class Ventas{
        var $valorVenta;

        function __construct($valorVenta){
        $this->valorVenta = $valorVenta;
        }

        public function seleccionarImagenes(){
            $imagen = "";

            if ($this->valorVenta >= 80) {
                $imagen = "semaforo/good.png";
            } else if ($this->valorVenta >= 50 && $this->valorVenta < 80) {
                $imagen = "semaforo/regular.png";
            }else{
                $imagen = "semaforo/bad.png";
            }

            return $imagen;
        }

    }

    class Factorial {
        var $nfactorial;
    
        function __construct($nfact) {
            $this->nfactorial = $nfact;
        }

        public function nFactorial(){
            $factorial = 1;
        
            for($n = $this ->nfactorial; $n >0; $n--){
                $factorial *= $n;
            }

            return $factorial;
        }
    }

    class Arreglo {
        var $miArreglo = array();
    
        function __construct() {
            for ($i = 0; $i < 20; $i++) {
                $this->miArreglo[] = $i;
            }
        }
    
        public function encontrarElementoMayor() {
            // Encontrar el elemento mayor
            $elementoMayor = max($this->miArreglo);
            // Encontrar la posición del elemento mayor
            $posicion = array_search($elementoMayor, $this->miArreglo);
    
            // Devolver el elemento mayor y su posición
            return array('elementoMayor' => $elementoMayor, 'posicion' => $posicion);
        }
    }
    
?>