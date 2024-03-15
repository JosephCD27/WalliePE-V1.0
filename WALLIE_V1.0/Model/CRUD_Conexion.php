<?php
    require_once("../../Conexion/claseConexion.php");
    class classCRUD{
        private $connection;

        function __construct() {
            //crea el objeto de la clase conexion y lo asigna a la variable privada conexion
            $this->connection = new connectionDB();
        }

//---------------------------------------Insertar---------------------------------------------
        function insertBD($Table,$valores,$campos) {
            //se invoca la conexion
            $Mysql = $this->connection->getConnect();
            //verifica la conexion
            if ($Mysql->connect_error) {
                die ("Conexión fallida: " . $Mysql->connect_error);
            }
            //Consulta se realiza la consulta de inserción a la BD
            $SQL = "INSERT INTO ".$Table."(";
            //se encarga de recorrer N candidad de campos según la tabla
            foreach ($campos as $posicion => $Dato) {
                    $SQL.= $Dato.",";
                }
            $SQL = rtrim($SQL,",");
            $SQLl = $SQL. ") VALUES (";
            //se encarga de recorrer N candidad de valores según la tabla
            foreach ($valores as $posicion => $Valor) {
                $SQLl.= "'".$Valor."',";
            }
            $SQLl = rtrim($SQLl,",");
            $insert = $SQLl. ");";//consulta completada

            /*Esta función ejecuta la consulta SQL almacenada en la variable $insert 
            en la base de dato MySQL representada por la variable $Mysql. 
            La función devuelve TRUE si la consulta se ejecutó con éxito y FALSE si hubo un error.*/
            if (mysqli_query($Mysql, $insert)){
                $resultado = "Nuevo registro creado";
              }else{
                $resultado = "Error: " . $insert . "<br>" . mysqli_error($Mysql);
              }
            //la variable que retorna el método select según la ejecución de la consulta
            return $resultado;
        }
//--------------------------------------Actualizar---------------------------------------------------
        function updateBD($tabla,$campoPK, $id,$arreglo) {

            $conected = $this->connection->getConnect();
            //verifica la conexion
            if ($conected->connect_error) {
            die ("Conexión fallida: " . $conected->connect_error);
            }
            // se encarga de llamar los campos de la tabla
            $consulta = "SHOW COLUMNS FROM ".$tabla;
            $resultado = $conected->query($consulta);
            
            //proceso para capturar los campos de la tabla
            //num_rows se utiliza para obtener el número de filas en un conjunto de resultados.
            if ($resultado->num_rows > 0) {
              // se crea un array para almacenar los nombres de los campos
              $campos = array();
              /*- se almacenan los  campos en el array
                - $row es un array asociativo que contiene los dato de la fila actual del conjunto de resultados.
                - el método fetch_assoc() devuelve una fila de dato de un conjunto de resultados*/
              while($fila = $resultado->fetch_assoc()) {
                $campos[] = $fila["Field"];
              }
    
              // Construir la parte SET de la consulta
              $set = "";
              
              foreach ($campos as $campo) {
                /*Comprueba si existe un elemento en el array $arreglo con una clave que coincide 
                con el valor actual de $campo con if(isset).*/
                if (isset($arreglo[$campo])) {
                  $set .= "$campo = '".$arreglo[$campo]."', ";
                }
              }
              $set = rtrim($set, ", "); // Eliminar la última coma
              //se junta toda la consulta
              $consulta = "UPDATE ".$tabla." SET ".$set." WHERE ".$campoPK." = '".$id."';";
              
              //resultado de la consulta
              if ($conected->query($consulta) === TRUE) {
                $respuesta = "Registro actualizado exitosamente";
              } else {
                $respuesta = "Error actualizando registro: " . $conected->error;
              }
            }else{
                $respuesta= "no hay ningun usuario con ese id";
            }
            return $respuesta;
        }
//-------------------------------------Seleccionar----------------------------------------------------
        function selectBD($tabla,$campo,$condicion){
            $dato="*";

            //se invoca la conexion
            $mysqli = $this->connection->getConnect();

            //verifica la conexion
            if ($mysqli->connect_error) {
                die ("Conexión fallida: " . $mysqli->connect_error);
            }

            //condicional para mostrar todos los registros y despues filtrarlos
            if ($campo != null) {

              //Consulta para filtrar registros
              $select = "SELECT ".$dato." FROM ".$tabla." WHERE ".$campo." LIKE '%".$condicion."%';";

              //Esta función ejecuta la consulta SQL almacenada en la variable $result
              $resultado = $mysqli->query($select);
            } else {

              //consulta para mostrar todos los registros en caso de no escoger un filtro
              $select = "SELECT ".$dato." FROM ".$tabla.";";
              
              //conexion con la base de dato
              $resultado = $mysqli->query($select);
              
            }

            $dato = array();
            if ($resultado->num_rows > 0) {
                while($fila = $resultado->fetch_assoc()) {
                    $dato[] = $fila;
                }
            }
            return $dato;
        }
//-------------------------------------------Eliminar----------------------------------------------------
        function deleteBD($tabla,$campo,$id){ //agregar variable para generalizar
          //invocar conexion
          $mysql= $this->connection->getConnect();
          //verifica la conexion
          if ($mysql->connect_error) {
            die ("Conexión fallida: " . $mysql->connect_error);
          }
          //consulta de eliminación
          $consulta = "DELETE FROM $tabla WHERE $campo = $id";
          //resultado de la consulta
          if (mysqli_query($mysql, $consulta)) {
              $resultado = "Usuario eliminado con éxito.";
          } 
          else {
            $resultado = "ERROR: No se pudo eliminar el registro $consulta. " . mysqli_error($mysql);
          }
          return $resultado;
        }
    }
?>