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
                $resultado = mysqli_insert_id($Mysql);
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
                $respuesta = "<h6>Registro actualizado exitosamente</h6>";
              } else {
                $respuesta = "Error actualizando registro: " . $conected->error;
              }
            }else{
                $respuesta= "no hay ningun usuario con ese id";
            }
            return $respuesta;
        }
//-------------------------------------Seleccionar----------------------------------------------------
        function selectBD($tablaA,$datos,$campo,$condicion){

            //se invoca la conexion
            $mysqli = $this->connection->getConnect();
            //verifica la conexion
            if ($mysqli->connect_error) {
                die ("Conexión fallida: " . $mysqli->connect_error);
            }
            if (!isset($datos)) {
              $datos="*";
            }
            //condicional para mostrar todos los registros y despues filtrarlos
            if ($campo != null) {
              //Consulta para filtrar registros
              $select = "SELECT ".$datos." FROM ".$tablaA." WHERE ".$campo." LIKE '%".$condicion."%';";

              //Esta función ejecuta la consulta SQL almacenada en la variable $result
              $resultado = $mysqli->query($select);
              
            } else {
              //consulta para mostrar todos los registros en caso de no escoger un filtro
              $select = "SELECT ".$datos." FROM ".$tablaA.";";
              
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

        //------------------------------------CONSULTA DATOS PDF-------------------------------------------//

        function selectPDFBD($tabla, $datos, $condiciones, $join){

          $mysqli = $this->connection->getConnect();

          if ($mysqli->connect_error) {
              die ("Conexión fallida: " . $mysqli->connect_error);
          }
          if (!isset($datos)) {
              $datos = "*";
          }
          $select = "SELECT ".$datos." FROM ".$tabla;
          
          //Consulta JOIN 
          if (isset($join)) {
              $select .= " INNER JOIN ".$join['tablaJoin']." ON ".$join['on'];
          }

          if ($condiciones != null) {
              $Z = 0;
              $select .= " WHERE ";
              foreach ($condiciones as $D) {
                  if ($Z === 0){
                      $select .= $D;  
                      $Z++;
                  } else {
                      $select .= " AND ".$D;
                  }
              }
          }
          $select .= ";";

          $resultado = $mysqli->query($select);

          $dato = array();
          if ($resultado->num_rows > 0) {
              while($fila = $resultado->fetch_assoc()) {
                  $dato[] = $fila;
              }
          }
          return $dato;
        }


          /*
                  $select = "SELECT ".$datos." FROM ".$tabla;
                  if ($condiciones != null) {
                      $select .= " WHERE ";
                      $clausulas = array();
                      foreach ($condiciones as $clave => $valor) {
                          if ($valor) {
                              $clausulas[] = "$clave = 1";
                          }
                      }
                      $select .= implode(' AND ', $clausulas);
                  }
                  $select .= ";";
        */


/*

        function selectPDFBD($tabla,$datos,$condiciones){

          $mysqli = $this->connection->getConnect();

          if ($mysqli->connect_error) {
              die ("Conexión fallida: " . $mysqli->connect_error);
          }
          if (!isset($datos)) {
            $datos="*";
          }
          if ($condiciones != null) {
                $Z=0;
                $select ="SELECT ".$datos." FROM ".$tabla." WHERE ";
              foreach ($condiciones as $D) {
                  
                if ($Z===0){
                  $select.=$D;  
                  $Z++;
                }else{
                $select.=" AND ".$D;
                }
              }
              $select.=";";
          } else {
            $select = "SELECT ".$datos." FROM ".$tabla.";";
          }


          echo $select;
          $resultado = $mysqli->query($select);

          $dato = array();
          if ($resultado->num_rows > 0) {
              while($fila = $resultado->fetch_assoc()) {
                  $dato[] = $fila;
              }
          }
          return $dato;
        }
*/


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
              $resultado = "<h6>Registro eliminado con éxito.<h6>";
          } 
          else {
            $resultado = "ERROR: No se pudo eliminar el registro $consulta. " . mysqli_error($mysql);
          }
          return $resultado;
        }
//------------------------------------------Cosulta con mas de un campo-----------------------------------

        function buscarBD($tablaA, $datos, $campos, $valorComun) {
          //se invoca la conexion
          $mysqli = $this->connection->getConnect();
          //verifica la conexion
          if ($mysqli->connect_error) {
              die("Conexión fallida: " . $mysqli->connect_error);
          }
          if (!isset($datos)) {
              $datos = "*";
          }

          // Iniciar la consulta con la parte SELECT
          $select = "SELECT " . $datos . " FROM " . $tablaA;

          // Verificar si hay campos para agregar a la cláusula WHERE
          if (!empty($campos)) {
              $clausulas = array();
              foreach ($campos as $campo) {
                  $clausulas[] = "$campo LIKE '%$valorComun%'";
              }
              // Unir todas las cláusulas con OR y agregarlas a la consulta
              $select .= " WHERE " . implode(' OR ', $clausulas);
          }
          $select .= ";";

          // Ejecutar la consulta
          $resultado = $mysqli->query($select);
        
          $dato = array();
          if ($resultado->num_rows > 0) {
              while($fila = $resultado->fetch_assoc()) {
                  $dato[] = $fila;
              }
          }
          return $dato;
        }
        
//------------------------------------------Inner Join----------------------------------------------------
        function innerJoin($tablas,$primarias,$campos, $condicionWhere){
          $mysqli = $this->connection->getConnect();
        
          if ($mysqli->connect_error) {
            die ("Conexión fallida: " . $mysqli->connect_error);
          }
          //vuelve en una cadena de texto y la separa por comas
          $convertir = implode(', ',$campos);
          //llama la primera posicion del arreglo y despues la elimina para seguir con la consulta
          $consulta="SELECT ".$convertir." FROM ".array_shift($tablas);
          //recorre N veces la consulta inner 
          foreach ($tablas as $posicion => $valor) {
            $consulta.=" INNER JOIN ".$valor." ON ".$primarias[$posicion];
          }
            $consulta .= $condicionWhere; 
            
          $resultado=$mysqli->query($consulta);

          $datos=array();
        
          if ($resultado->num_rows > 0) {
            while ($fila=$resultado->fetch_assoc()) {
              $datos[]=$fila;
            }
          }
        
          return $datos;
        }

        function segundoInnerJoin($tablas,$primarias,$campos,$condicionWhere){
          $mysqli = $this->connection->getConnect();
        
          if ($mysqli->connect_error) {
            die ("Conexión fallida: " . $mysqli->connect_error);
          }
          //vuelve en una cadena de texto y la separa por comas
          $convertir = implode(', ',$campos);
          //llama la primera posicion del arreglo y despues la elimina para seguir con la consulta
          $consulta="SELECT ".$convertir." FROM ".array_shift($tablas);
          //recorre N veces la consulta inner 
          foreach ($tablas as $posicion => $valor) {
            $consulta.=" INNER JOIN ".$valor." ON ".$primarias[$posicion];
          }
          $consulta.=$condicionWhere;

          $resultado=$mysqli->query($consulta);

          $datos=array();
        
          if ($resultado->num_rows > 0) {
            while ($fila=$resultado->fetch_assoc()) {
              $datos[]=$fila;
            }
          }
        
          return $datos;
        }
    }
?>