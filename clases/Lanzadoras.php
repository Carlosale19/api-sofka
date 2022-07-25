<?php 



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Lanzadoras extends Naves {

    protected $empuje;
    protected $potencia;
    protected $capacidad_transporte;
    protected $altura;
    protected $nombre_nave;

    public function __construct($nombre, $combustible ,$funcion ,$primer_lanzamiento , $ultimo_lanzamiento, 
    $estado, $pais, $empuje, $potencia, $capacidad_transporte,$altura){

        parent::__construct($nombre, $combustible ,$funcion ,$primer_lanzamiento , $ultimo_lanzamiento, 
        $estado, $pais);
        $this->empuje = (float) $empuje;
        $this->potencia = (float) $potencia;
        $this->capacidad_transporte = (float) $capacidad_transporte;
        $this->altura = (float) $altura;
        $this->nombre_nave = $nombre;
    }
    //funcion para consumir una api, con el for each se genera el html y se retorna en la funcion para ingresarlo en la table

    static function listarNaves(){
        $res = file_get_contents("https://apisofka.devtoulpy.com/api/get-all-lanzadoras");
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
            $html .= "<td>".$nave->empuje."</td>";
            $html .= "<td>".$nave->potencia."</td>";
            $html .= "<td>".$nave->capacidad_transporte."</td>";
            $html .= "<td>".$nave->altura."</td></tr>";
        }

        return $html;

    }
    
    static function crearNave($lanzadora){

        //Con el objeto que se pase como parametro se va a construir un json 
        //y se va a pasar a la api ya creada para guardarlo en la base de datos}

        $data = [
            'nombre' => $lanzadora->nombre,
            'combustible' => $lanzadora->combustible,
            'funcion' => $lanzadora->funcion,
            'primer_lanzamiento' => $lanzadora->primer_lanzamiento,
            'ultimo_lanzamiento' => $lanzadora->ultimo_lanzamiento,
            'estado' => $lanzadora->estado,
            'pais' => $lanzadora->pais,
            'empuje' => $lanzadora->empuje,
            'potencia' => $lanzadora->potencia,
            'capacidad_transporte' => $lanzadora->capacidad_transporte,
            'altura' => $lanzadora->altura,
        ];
        $postdata = http_build_query($data);
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, 'https://apisofka.devtoulpy.com/api/set-lanzadora');
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        
        /*
        echo $result;
        
        if(curl_exec($ch) === false)
        {
            echo 'Curl error: ' . curl_error($ch);
        }
        else
        {
            echo 'Operación completada sin errores';
        }
        */
        curl_close($ch);
        
        header('Location: index.php');
        
    }

    static function buscarPorNombre($nombre){
        $res = file_get_contents("https://apisofka.devtoulpy.com/api/get-all-lanzadoras");
        $res = json_decode($res);

        //Generando html
        $html = "";

        $naveBuscada = "";
        foreach($res->data as $nave){
            if($nave->nombre_nave == $nombre){
                $naveBuscada = $nave;
            }
        }
        if($naveBuscada == ""){
            echo "no se encontro ninguna nave";
        }else{
            $html .= "<ul><li> Nombre: ".$naveBuscada->nombre_nave."</li>";
            $html .= "<li> Combustible: ".$naveBuscada->combustible."</li>";
            $html .= "<li>Funcion: ".$naveBuscada->funcion."</li>";
            $html .= "<li>Primer Lanzamiento: ".$naveBuscada->primer_lanzamiento."</li>";
            $html .= "<li>Ultimo Lanzamiento: ".$naveBuscada->ultimo_lanzamiento."</li>";
            $html .= "<li>Estado actual: ".$naveBuscada->estado."</li>";
            $html .= "<li>Pais: ".$naveBuscada->pais."</li>";
            $html .= "<li>Empuje: ".$naveBuscada->empuje."</li>";
            $html .= "<li>Potencia: ".$naveBuscada->potencia."</li>";
            $html .= "<li>Capacidad de transporte: ".$naveBuscada->capacidad_transporte."</li>";
            $html .= "<li>Altura: ".$naveBuscada->altura."</li></ul>";
        }

        return $html;
    }
    static function buscarPorPais($pais){
        $res = file_get_contents("https://apisofka.devtoulpy.com/api/get-all-lanzadoras");
        $res = json_decode($res);

        //Generando html
        $html = "";

        $naveBuscada = array();

        foreach($res->data as $nave){
            if($nave->pais == $pais){
                array_push($naveBuscada, $nave);
            }
        }
        foreach($naveBuscada as $nave){
            $html .= "<ul><li> Nombre: ".$nave->nombre_nave."</li>";
            $html .= "<li> Combustible: ".$nave->combustible."</li>";
            $html .= "<li>Funcion: ".$nave->funcion."</li>";
            $html .= "<li>Primer Lanzamiento: ".$nave->primer_lanzamiento."</li>";
            $html .= "<li>Ultimo Lanzamiento: ".$nave->ultimo_lanzamiento."</li>";
            $html .= "<li>Estado actual: ".$nave->estado."</li>";
            $html .= "<li>Pais: ".$nave->pais."</li>";
            $html .= "<li>Empuje: ".$nave->empuje."</li>";
            $html .= "<li>Potencia: ".$nave->potencia."</li>";
            $html .= "<li>Capacidad de transporte: ".$nave->capacidad_transporte."</li>";
            $html .= "<li>Altura: ".$nave->altura."</li></ul>";
        }

        return $html;
    }

}


?>
