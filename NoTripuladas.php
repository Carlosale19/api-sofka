<?php 



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class NoTripuladas extends Naves {

    protected $velocidad;
    protected $empuje;
    protected $nombre_nave;

    public function __construct($nombre, $combustible ,$funcion ,$primer_lanzamiento , $ultimo_lanzamiento, 
    $estado, $pais, $velocidad, $empuje){

        parent::__construct();
        $this->velocidad = $velocidad;
        $this->empuje = $empuje;
        $this->nombre_nave = $nombre;
    }
    //funcion para consumir una api, con el for each se genera el html y se retorna en la funcion para ingresarlo en la table

    static function listarNaves(){
        $res = file_get_contents("https://apisofka.devtoulpy.com/api/get-all-no-tripuladas");
        $res = json_decode($res);

        //Generando html
        $html = "";

        foreach($res->data as $nave){
            $html .= "<tr><td>".$nave->nombre_nave."</td>";
            $html .= "<td>".$nave->combustible."</td>";
            $html .= "<td>".$nave->funcion."</td>";
            $html .= "<td>".$nave->primer_lanzamiento."</td>";
            $html .= "<td>".$nave->ultimo_lanzamiento."</td>";
            $html .= "<td>".$nave->estado."</td>";
            $html .= "<td>".$nave->pais."</td>";
            $html .= "<td>".$nave->velocidad."</td>";
            $html .= "<td>".$nave->empuje."</td></tr>";
        }

        return $html;

    }
    
    static function crearNave($lanzadora){

        //Con el objeto que se pase como parametro se va a construir un json 
        //y se va a pasar a la api ya creada para guardarlo en la base de datos
        
    }


}


?>