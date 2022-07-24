<?php 


//Creando clase padre
abstract class Naves {

    protected $nombre;
    protected $combustible;
    protected $funcion;
    protected $primer_lanzamiento;
    protected $ultimo_lanzamiento;
    protected $estado;
    protected $pais;

    public function __construct($nombre, $combustible ,$funcion ,$primer_lanzamiento , $ultimo_lanzamiento, $estado, $pais){
        $this->nombre =$nombre;
        $this->combustible = $combustible;
        $this->funcion = $funcion;
        $this->primer_lanzamiento =$primer_lanzamiento;
        $this->ultimo_lanzamiento = $ultimo_lanzamiento;
        $this->estado = $estado;
        $this->pais = $pais;
    }

    abstract static function crearNave($nave);

    abstract static function listarNaves();

}


//Creando comportamientos para cada tipo de nave

//Comportamientos naves tripuladas
interface tripulantes{
    function salir_capsula();

    function entrar_capsula();
}

//Comportamiento naves lanzadoras
interface carga{
    function soltar_carga();   

    function probar_carga();
}

//Comportamientos naves no tripuladas
interface funcion{
    
    function explorar_planeta();

    function estudiar_satelite();

}
?>