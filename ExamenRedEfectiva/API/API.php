<?php
 
$mysqli = new mysqli("localhost", "root", "", "examenredefectiva");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
  $mysqli->host_info . "\n";

// Crear un nuevo post

switch ($_SERVER['REQUEST_METHOD']) {

  case 'POST':
        /*SE ATRAPA EL JSON FORMADO*/
    ////Make sure that the content type of the POST request has been set to application/json
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if(strcasecmp($contentType, 'application/json') != 0){
    throw new Exception('Content type must be: application/json');
}
 
//Receive the RAW post data.
$content = trim(file_get_contents("php://input"));

////Attempt to decode the incoming RAW post data from JSON.
$decoded = json_decode($content, true);
//// var_dump($decoded);
////If json_decode failed, the JSON is invalid.
if(!is_array($decoded)){
    throw new Exception('Received content contained invalid JSON!');
}
// 
////Process the JSON.
  /*SE ATRAPA EL JSON FORMADO*/
/*SE SEPARAN*/
  
    $opcPOST = $decoded['opcionP'];
   



switch ($opcPOST) {

  case 'insertar':
    $matricula = $decoded['matricula'];
    $nombre = $decoded['nombre'];
    $apellidoP = $decoded['apellidoP'];
    $apellidoM = $decoded['apellidoM'];
    $fecha_nac = $decoded['fecha_nac'];
    $genero = $decoded['genero'];
    $grado = $decoded['grado'];
    

             $queryInsert="CALL `alumnos_registro`('".$matricula."','".$nombre."','".$apellidoP."','".$apellidoM."','".$fecha_nac."','".$genero."','".$grado."');";
             if(mysqli_query($mysqli,$queryInsert)==true){

               // $input['id'] = $postId;
                    header("HTTP/1.1 200 OK");//MENSAJE DE EXITO
                    $msjexitoInsert='[{"exito" : "200","matricula" : "'.$matricula.'"}]';
                    //echo json_encode($var); // SE FORMATEA EL JSON PARA MOSTRAR AL USUARIO
                    echo $msjexitoInsert; // SE FORMATEA EL JSON PARA MOSTRAR AL USUARIO

             }else{
                    header("HTTP/1.1 207 OK");//MENSAJE DE error
                    $msjerrorInsert='[{"error" : "207","matricula" : "No fue posible insertar en este momento."}]';
                    //echo json_encode($var); // SE FORMATEA EL JSON PARA MOSTRAR AL USUARIO
                    echo $msjerrorInsert; // SE FORMATEA EL JSON PARA MOSTRAR AL USUARIO
             }
 
    break;

    case 'DELETE':

 
    break;

  case 'detalle':
     $ID = $decoded['ID']; 
    $consulta_det = "CALL `alumnos_consulta_detalle`('".$ID."'); ";
    $resultado = $mysqli->query($consulta_det);
    $row =  mysqli_fetch_assoc($resultado) ;
    $json = json_encode($row);
                    header("HTTP/1.1 200 OK");//MENSAJE DE EXITO
                    $msjexitoInsert=$json;
                    //echo json_encode($var); // SE FORMATEA EL JSON PARA MOSTRAR AL USUARIO
                    echo $msjexitoInsert; // SE FORMATEA EL JSON PARA MOSTRAR AL USUARIO

    break;

case 'general':
    $consulta_det = "CALL `alumnos_all`(@p0);";
    $resultado = $mysqli->query($consulta_det);
    while($row = mysqli_fetch_assoc($resultado)) $array[] = $row;
   
    $json = json_encode($array);
                    header("HTTP/1.1 200 OK");//MENSAJE DE EXITO
                    $msjexitoInsert=$json;
                    //echo json_encode($var); // SE FORMATEA EL JSON PARA MOSTRAR AL USUARIO
                    echo $msjexitoInsert; // SE FORMATEA EL JSON PARA MOSTRAR AL USUARIO
    break;

case 'activos':
    $consulta_det = "CALL `alumnos_all_activos`(@p0);";
    $resultado = $mysqli->query($consulta_det);
    while($row = mysqli_fetch_assoc($resultado)) $array[] = $row;
   
    $json = json_encode($array);
                    header("HTTP/1.1 200 OK");//MENSAJE DE EXITO
                    $msjexitoInsert=$json;
                    //echo json_encode($var); // SE FORMATEA EL JSON PARA MOSTRAR AL USUARIO
                    echo $msjexitoInsert; // SE FORMATEA EL JSON PARA MOSTRAR AL USUARIO
    break;

case 'activos x grado':

    $grado = $decoded['grado'];
    $consulta_det = " CALL `alumnos_all_activos_grado`(".$grado.")"; 
    $resultado = $mysqli->query($consulta_det);
    while($row = mysqli_fetch_assoc($resultado)) $array[] = $row;
   
    $json = json_encode($array);
                    header("HTTP/1.1 200 OK");//MENSAJE DE EXITO
                    $msjexitoInsert=$json;
                    //echo json_encode($var); // SE FORMATEA EL JSON PARA MOSTRAR AL USUARIO
                    echo $msjexitoInsert; // SE FORMATEA EL JSON PARA MOSTRAR AL USUARIO
   
    break;

case 'reporte':
    $consulta_det = " CALL `alumnos_totales`(@p0); "; 
    $resultado = $mysqli->query($consulta_det);
    while($row = mysqli_fetch_assoc($resultado)) $array[] = $row;
   
    $json = json_encode($array);
                    header("HTTP/1.1 200 OK");//MENSAJE DE EXITO
                    $msjexitoInsert=$json;
                    //echo json_encode($var); // SE FORMATEA EL JSON PARA MOSTRAR AL USUARIO
                    echo $msjexitoInsert; // SE FORMATEA EL JSON PARA MOSTRAR AL USUARIO
    break;

}


    break;

    case 'PUT':

    /*SE ATRAPA EL JSON FORMADO*/
    ////Make sure that the content type of the POST request has been set to application/json
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if(strcasecmp($contentType, 'application/json') != 0){
    throw new Exception('Content type must be: application/json');
}
 
//Receive the RAW post data.
$content = trim(file_get_contents("php://input"));

////Attempt to decode the incoming RAW post data from JSON.
$decoded = json_decode($content, true);
//// var_dump($decoded);
////If json_decode failed, the JSON is invalid.
if(!is_array($decoded)){
    throw new Exception('Received content contained invalid JSON!');
}
// 
////Process the JSON.
  /*SE ATRAPA EL JSON FORMADO*/
/*SE SEPARAN*/

    $id = $decoded['id']; 
    $opcion = $decoded['opcion'];
    

switch ($opcion) {

  case 'baja':

      $estatus = $decoded['estatus'];

    $queryUPDBaja="CALL `alumnos_estatus`('".$estatus."', '".$id."'); ";
    $tmpUPDBaja =mysqli_query($mysqli,$queryUPDBaja);

  
  if(mysqli_affected_rows ( $mysqli)){
      
    header("HTTP/1.1 203 OK"); // MENSAJE DE EXITO

    $msjExitoUpdateBaja='[{"exito" : "203","msj" : "Baja Exitosa"}]';
    echo $msjExitoUpdateBaja;
    
  }else{
      header("HTTP/1.1 204 OK"); // ERROR
   
      $msjErrorUpdateBaja='[{"error" : "204","msj" : "Baja no Aplicada"}]';
    echo $msjErrorUpdateBaja;
      
    
  } 
    break;

  case 'modificar':

    $matricula = $decoded['matricula'];
    $nombre = $decoded['nombre'];
    $apellidoP = $decoded['apellidoP'];
    $apellidoM = $decoded['apellidoM'];
    $fecha_nac = $decoded['fecha_nac'];
    $genero = $decoded['genero'];
    $grado = $decoded['grado'];

    
    $queryUpdate=" CALL `alumnos_modificar`('".$matricula."','".$nombre."', '".$apellidoP."', '".$apellidoM."', '".$fecha_nac."', '".$genero."', '".$grado."','".$id."');";

   $tmpUpdate = mysqli_query($mysqli,$queryUpdate);
  
  if(mysqli_affected_rows ( $mysqli)){
      
    header("HTTP/1.1 205 OK"); // MENSAJE DE EXITO

    $msjExitoUpdate='[{"exito" : "205","msj" : "Actualizado"}]';
    echo $msjExitoUpdate;
    
  }else{

    header("HTTP/1.1 206 OK"); // ERROR
      $msjErrorUpdate='[{"error" : "206","msj" : "Alumno no Actualizado"}]';
    echo $msjErrorUpdate;
      
    
    
  } 

    break;
}


    break;
  
  default:
            header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST, PUT, DELETE');
    break;
}

//header("HTTP/1.1 400 Bad Request");