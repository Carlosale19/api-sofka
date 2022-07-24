<?php 



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Tripuladas extends Naves implements tripulantes{

    protected $capacidad_tripulantes;
    protected $peso;
    protected $km_orbita;
    protected $nombre_nave;
    protected $salieron;

    public function __construct($nombre, $combustible ,$funcion ,$primer_lanzamiento , $ultimo_lanzamiento, 
    $estado, $pais, $capacidad_tripulantes, $peso, $km_orbita){

        parent::__construct($nombre, $combustible ,$funcion ,$primer_lanzamiento , $ultimo_lanzamiento, 
        $estado, $pais);
        $this->capacidad_tripulantes = (integer) $capacidad_tripulantes;
        $this->peso =(float) $peso;
        $this->km_orbita =(float) $km_orbita;
        $this->nombre_nave = $nombre;
        $this->salieron = false;
    }
    //funcion para consumir una api, con el for each se genera el html y se retorna en la funcion para ingresarlo en la table

    static function listarNaves(){
        $res = file_get_contents("https://apisofka.devtoulpy.com/api/get-all-tripuladas");
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
            $html .= "<td>".$nave->capacidad_tripulantes."</td>";
            $html .= "<td>".$nave->peso."</td>";
            $html .= "<td>".$nave->km_orbita."</td></tr>";
        }

        return $html;

    }
    
    static function crearNave($tripulada){

        //Con el objeto que se pase como parametro se va a construir un json 
        //y se va a pasar a la api ya creada para guardarlo en la base de datos
        
        $data = [
            'nombre' => $tripulada->nombre,
            'combustible' => $tripulada->combustible,
            'funcion' => $tripulada->funcion,
            'primer_lanzamiento' => $tripulada->primer_lanzamiento,
            'ultimo_lanzamiento' => $tripulada->ultimo_lanzamiento,
            'estado' => $tripulada->estado,
            'pais' => $tripulada->pais,
            'capacidad_tripulantes' => $tripulada->capacidad_tripulantes,
            'peso' => $tripulada->peso,
            'km_orbita' => $tripulada->km_orbita
        ];
        $postdata = http_build_query($data);
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, 'https://apisofka.devtoulpy.com/api/set-tripuladas');
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        echo $result;

        if(curl_exec($ch) === false)
        {
            echo 'Curl error: ' . curl_error($ch);
        }
        else
        {
            echo 'Operación completada sin errores';
        }

        curl_close($ch);
        
        //header('Location: index.php');
    }

    //Interfaces abstractas para comportamiento de las naves
    function salir_capsula(){
        
        if($salieron == false){
            $mensaje = "los tripulantes salieron de la capsula";
            $this->salieron = true;
        }else{
            $mensaje = "Los tripulantes ya salieron de la nave";
        }
        
        return $salieron;

    }

    function entrar_capsula(){

        if($salieron == true){
            $mensaje = "los tripulantes entraron a la capsula";
            $this->salieron = false;
        }else{
            $mensaje = "los tripulantes ya habian entrado a la capsula";
        }

        return $salieron;

    }
}


?>