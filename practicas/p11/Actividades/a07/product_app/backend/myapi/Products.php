<?php
namespace TECWEB\MYAPI;

use TECWEB\MYAPI\DataBase as DataBase;
require_once __DIR__ . '/DataBase.php';

class Products extends DataBase {
    private $response = [];

    public function __construct($db, $user= 'root', $pass= 'Raquel1809*') {
        parent::__construct($user, $pass, $db);
        mysqli_set_charset($this->conexion, "utf8");
        $this->response = array();
    }

        public function list() {
            //SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA JSON
            $this->response = array();
            //SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        if ($result = $this->conexion->query("SELECT * FROM productos WHERE eliminado = 0")) {
            //SE OBTIENEN LOS RESULTADOS
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            if(!is_null($rows)) {
            //SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL AREGLO DE RESPUESTA
            foreach($rows as $num => $row) {
                foreach($row as $key => $value) {
                    $this->response[$num][$key] = $value;
                }
            }
        }
        $result->free();
    }else  {
        // SE GUARDA EL ERROR EN EL ARREGLO DE RESPUESTA
        $this->response = array(
            'error' => 'Query Error: ' . mysqli_error($this->conexion)
        );
    }
    $this->conexion->close();
}

        public function singleByName($name) {
        // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA JSON
        $this->response = array();

        if ($result = $this->conexion->query("SELECT * FROM productos 
                                                WHERE (id = '{$name}' 
                                                OR nombre LIKE '%{$name}%' 
                                                OR marca LIKE '%{$name}%' 
                                                OR detalles LIKE '%{$name}%')
                                            AND eliminado = 0")) {
            // SE OBTIENEN LOS RESULTADOS
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            if (!is_null($rows)) {
                // SE CODIFICAN LOS DATOS A UTF-8 Y SE MAPEAN AL ARREGLO DE RESPUESTA
                foreach ($rows as $num => $row) {
                    foreach ($row as $key => $value) {
                        $this->response[$num][$key] = $value;
                    }
                }
            }

            $result->free();
        } else {
        // SE GUARDA EL ERROR SI LA CONSULTA FALLA
        $this->response = array(
            'error' => 'Query Error: ' . mysqli_error($this->conexion)
        );
    }

    $this->conexion->close();
}

        public function getData() {
            return json_encode($this->response, JSON_PRETTY_PRINT);
    }
}
?>