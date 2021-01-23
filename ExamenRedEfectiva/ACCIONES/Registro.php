 <?php
include_once("../header.php"); 


if(@$_POST['formulario']=='Registrar'){
 

  $matricula = $_POST['matricula'];
  $nombre = $_POST['nombre'];
  $apellidoP = $_POST['apellidoP'];
  $apellidoM = $_POST['apellidoM'];
  $fecha_nac = $_POST['fecha_nac'];
  $genero = $_POST['genero'];
  $grado = $_POST['grado'];

 //::::::::::::::::::::::::::::::::::::::::::
  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost/ExamenRedEfectiva/API/API.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "matricula" : "'.$matricula.'",
  "nombre" : "'.$nombre.'",
  "apellidoP" : "'.$apellidoP.'",
  "apellidoM" : "'.$apellidoM.'",
  "fecha_nac" : "'.$fecha_nac.'",
  "genero" : "'.$genero.'",
  "grado" : "'.$grado.'",
  "opcionP" : "insertar"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
  $response;
$array = json_decode($response);
//var_dump($array);
 //:::::::::::::::::::::::::::::::::::::::::: 
         
        if ( $array[0]->matricula!=0 ) {
               echo '<div class="alert alert-success"> El alumno <strong>'.$nombre." ".$apellidoP." ".$apellidoM."</strong> con número de matricula <strong>".$matricula."</strong> ha sido registrado correctamente".' <a href="Registro.php" type="button" class="btn btn-secondary btn-sm">Volver</a></div>';
            } else {
               echo '<div class="alert alert-danger"> El alumno <strong>'.$nombre." ".$apellidoP." ".$apellidoM."</strong> con número de matricula <strong>".$array[0]->matricula."</strong> ".' <a href="Registro.php" type="button" class="btn btn-secondary btn-sm">Volver</a></div>';
            }
}else{
?> 
 <form method="post" action="" >
                    <div class="row"> <!--row-->                    
                      <div class="col-12">
                        <div class="form-group">
                            <label><span class="text-req">*</span>Matricula</label>
                            <div class="input-group">                                 
                                <input type="text" step="1" max="4" class="form-control form-control-sm" name="matricula" placeholder="" required="required"> 
                            </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                            <label><span class="text-req">*</span>Nombre</label>
                            <div class="input-group">                                 
                                <input type="text"  class="form-control form-control-sm" name="nombre" placeholder="" required="required" > 
                            </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                            <label><span class="text-req">*</span>Apellido Paterno</label>
                            <div class="input-group">                                 
                                <input type="text"  class="form-control form-control-sm" name="apellidoP" placeholder="" required="required" > 
                            </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                            <label><span class="text-req">*</span>Apellido Materno</label>
                            <div class="input-group">                                 
                                <input type="text"  class="form-control form-control-sm" name="apellidoM" placeholder="" required="required" > 
                            </div>
                        </div>
                      </div>

                      <div class="col-4">
                        <div class="form-group">
                            <label><span class="text-req">*</span>Fecha de nacimiento</label>
                            <div class="input-group">                                 
                                <input type="date"  class="form-control form-control-sm" name="fecha_nac" placeholder="" required="required"> 
                            </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                            <label><span class="text-req">*</span>Genero</label>
                            <div class="input-group">                                 
                                  <select  class="form-control form-control-sm" required="required" name="genero" >
                                      <option value="">Seleccione</option>
                                      <option value="M">Masculino</option>
                                      <option value="F">Femenino</option>

                                  </select>
                            </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                            <label><span class="text-req">*</span>Grado escolar</label>
                            <div class="input-group">                                 
                                <input type="number" step="1" class="form-control form-control-sm" name="grado" placeholder="" required="required"> 
                            </div>
                        </div>
                      </div>

                      <div class="col-4">
                        <div class="form-group">
                            <input type="hidden" name="formulario" value="Registrar">
                            <button type="submit" class="btn btn-secondary btn-sm">Registrar</button>
                        </div>
                      </div>
                    </div> <!--row-->
                    </form>
 <?php 
}
include_once("../footer.php");
?>