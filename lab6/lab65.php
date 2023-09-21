<?php

    class ClaseBase {
        public function test() {
            echo "ClaseBase::test() llamada\n";
        }
        
        final public function masTests() {
            echo "ClaseBase::masTests() llamada\n";
        }
    }
    
    class ClaseHijo extends ClaseBase {
        public function masTests() {
            echo "ClaseHijo::masTests() llamada\n";
        }
    }

    /* 
    Error grave: No se puede anular el método final ClaseBase::masTests() 
    en C:\xampp\htdocs\DS-VII\lab6\lab65.php en la línea 17 
    
    Esto se debe a que se está tratando de "llamar" o más bien modificar la función masTests de la clase padre en la clase
    hija, cuando esto no se puede porque así se evita que se modifiue la clase padre. 
    
    */

?>