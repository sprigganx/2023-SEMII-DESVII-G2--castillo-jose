<?php
    require_once('modelo.php');

    class noticia extends modeloCredencialesBD{
        protected $titulo;
        protected $texto;
        protected $categoria;
        protected $fecha;
        protected $imagen;

        public function __construct() {
            parent::__construct();
        }

        public function consultar_noticias(){
            $instruccion = "CALL sp_listar_noticias()";

            $consulta=$this->_db->query($instruccion);
            $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

            if(!$resultado){
                echo "Fallo al conectar las noticias";
            }else{
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }

        public function consultar_noticias_filtro($campo, $valor) {
            $instruccion = "CALL sp_listar_noticias_filtro('".$campo."', '" .$valor."')";
    
            $consulta=$this->_db->query($instruccion);
            $resultado=$consulta->fetch_all(MYSQLI_ASSOC);
    
            if ($resultado){
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }

        public function consultar_noticiasPaginadas($comienzo, $num) {
            $instruccion = "CALL sp_navegacion_noticias($comienzo, $num)";
        
            $consulta = $this->_db->query($instruccion);
            
            if (!$consulta) {
                echo "Fallo al conectar las noticias";
            } else {
                $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
                $consulta->close();
                $this->_db->close();
                return $resultado;
            }
        }        
    }
?>