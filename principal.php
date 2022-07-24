<?php 


require 'Naves.php';
require 'Lanzadoras.php';
require 'Tripuladas.php';
require 'NoTripuladas.php';

if(isset($_POST['nombre'])){
    Principal::guardarDatos();
}



//clase donde se van a hacer las validacion y redirigir a los metodos para agregar y filtrar naves
class Principal{

    public static function guardarDatos(){

        //Guardando los datos de la nave en comun
        if(isset($_POST['nombre'])){
            $nombre = $_POST['nombre'];
            $combustible = $_POST['combustible'];
            $funcion = $_POST['funcion'];
            $primer_lanzamiento = $_POST['primer_lanzamiento'];
            $ultimo_lanzamiento = $_POST['ultimo_lanzamiento'];
            $estado = $_POST['estado'];
            $pais = $_POST['pais'];
        }else{
            echo 'no se esta recibiendo nada';
        }

        //Validando el tipo de nave y creando el objeto
        if(isset($_POST['tipo'])){
            if ($_POST['tipo'] == 'lanzadoras'){ 
                //Hay que verificar el tipo de la nave para luego construir un objeto de la nave 
                //y luego llamar a la funcion de crear la nave

                $empuje = $_POST['empuje'];
                $potencia = $_POST['potencia'];
                $capacidad_transporte = $_POST['capacidad_transporte'];
                $altura = $_POST['altura'];
                $nave = new Lanzadoras($nombre,$combustible,$funcion,$primer_lanzamiento,$ultimo_lanzamiento,
                $estado,$pais,$empuje,$potencia,$capacidad_transporte,$altura);
                Lanzadoras::crearNave($nave);
            }
        }
    }
}



?>