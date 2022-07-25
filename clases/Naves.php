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

    abstract static function buscarPorNombre($nombre);

    abstract static function buscarPorPais($pais);
}
?>