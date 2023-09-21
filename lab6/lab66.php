<?php

    final class ClaseBase {

        public function test() {
            echo "ClaseBase::test() llamada\n";}
            // Aquí da igual si se declara el método como
            // final o no
            
        final public function moreTesting() {
            echo "ClaseBase::moreTesting() llamada\n";
        }
        
        }class ClaseHijo extends ClaseBase {
        }

        /* 
        Fatal error: Clase ClaseHijo no puede heredar de la clase final (ClaseBase) in 
        C:\xampp\htdocs\DS-VII\lab6\lab66.php on line 16 
        
        Esto se da porque la clase padre está declarada como final, cosa que hace que no se pueda
        editar de ella o más bien que se pueda heredar de esa clase
        */

?>