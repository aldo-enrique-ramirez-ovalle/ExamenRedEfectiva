 <?php
include_once("../header.php"); 

@$ID=$_GET['ID'];
@$accion=$_GET['accion'];
if(@$ID>0 && $accion=='B'){
      

      $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost/ExamenRedEfectiva/API/API.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS =>'{
  "id" : "'.$ID.'",
  "estatus" : "B",
  "opcion" : "baja"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
 $response;
         $array = json_decode($response);

        if ($array[0]->msj=="Baja Exitosa"  ) {
               echo '<div class="alert alert-success"> El alumno  ha sido dado de baja correctamente<a href="/ExamenRedEfectiva/ACCIONES/Consultas.php?accion=B" type="button" class="btn btn-secondary btn-sm">Volver</a></div>';
            } else {
               echo '<div class="alert alert-danger"> El alumno no ha sido dado de baja intentelo mas tarde<a href="/ExamenRedEfectiva/ACCIONES/Consultas.php?accion=B" type="button" class="btn btn-secondary btn-sm">Volver</a></div>';
            }
}

if(@$ID>0 && $accion=='M'){
 

if(@$_POST['formulario']=='Registrar'){

  $matricula = $_POST['matricula'];
  $nombre = $_POST['nombre'];
  $apellidoP = $_POST['apellidoP'];
  $apellidoM = $_POST['apellidoM'];
  $fecha_nac = $_POST['fecha_nac'];
  $genero = $_POST['genero'];
  $grado = $_POST['grado'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost/ExamenRedEfectiva/API/API.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS =>'{
  "id" : "'.$ID.'",
  "matricula" : "'.$matricula.'",
  "nombre" : "'.$nombre.'",
  "apellidoP" : "'.$apellidoP.'",
  "apellidoM" : "'.$apellidoM.'",
  "fecha_nac" : "'.$fecha_nac.'",
  "genero" : "'.$genero.'",
  "grado" : "'.$grado.'",   
  "opcion" : "modificar"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$array = json_decode($response);        
        if ($array[0]->msj=="Actualizado" ) {
               echo '<div class="alert alert-success"> El alumno <strong>'.$nombre." ".$apellidoP." ".$apellidoM."</strong> con número de matricula <strong>".$matricula."</strong> ha sido modificado correctamente".' <a href="/ExamenRedEfectiva/ACCIONES/Consultas.php?accion=M" type="button" class="btn btn-secondary btn-sm">Volver</a></div>';
            } else {
               echo '<div class="alert alert-danger"> El alumno <strong>'.$nombre." ".$apellidoP." ".$apellidoM."</strong> con número de matricula <strong>".$matricula."</strong> no ha sido modificado".' <a href="/ExamenRedEfectiva/ACCIONES/Consultas.php?accion=M" type="button" class="btn btn-secondary btn-sm">Volver</a></div>';
            }
}

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::

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
  "ID" : "'.$ID.'",
  "opcionP" : "detalle"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
  $response;
$array_det = (json_decode("[".$response."]"));
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 
  $array_det[0]->matricula;
 
 


 

?> 
 <form method="post" action="<?php $_SERVER['DOCUMENT_ROOT'];?>/ExamenRedEfectiva/ACCIONES/Consultas.php?accion=M&ID=<?php echo $array_det[0]->id;?>" >
                    <div class="row" > <!--row-->                    
                      <div class="col-12">
                        <div class="form-group">
                            <label><span class="text-req">*</span>Matricula</label>
                            <div class="input-group">                                 
                                <input type="text" step="1" max="4" class="form-control form-control-sm" name="matricula" placeholder="" required="required" value="<?php echo $array_det[0]->matricula;?>" > 
                            </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                            <label><span class="text-req">*</span>Nombre</label>
                            <div class="input-group">                                 
                                <input type="text"  class="form-control form-control-sm" name="nombre" placeholder="" required="required" value="<?php echo $array_det[0]->nombre;?>"  > 
                            </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                            <label><span class="text-req">*</span>Apellido Paterno</label>
                            <div class="input-group">                                 
                                <input type="text"  class="form-control form-control-sm" name="apellidoP" placeholder="" required="required" value="<?php echo $array_det[0]->apellidoP;?>"  > 
                            </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                            <label><span class="text-req">*</span>Apellido Materno</label>
                            <div class="input-group">                                 
                                <input type="text"  class="form-control form-control-sm" name="apellidoM" placeholder="" required="required" value="<?php echo $array_det[0]->apellidoM;?>"  > 
                            </div>
                        </div>
                      </div>

                      <div class="col-4">
                        <div class="form-group">
                            <label><span class="text-req">*</span>Fecha de nacimiento</label>
                            <div class="input-group">                                 
                                <input type="date"  class="form-control form-control-sm" name="fecha_nac" placeholder="" required="required" value="<?php echo $array_det[0]->fecha_nac;?>" > 
                            </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                            <label><span class="text-req">*</span>Genero</label>
                            <div class="input-group">                                 
                                  <select  class="form-control form-control-sm" required="required" name="genero" >
                                      <option value="">Seleccione</option>
                                      <option value="M" <?php if($array_det[0]->genero=='Masculino'){ echo "selected"; }?> >Masculino</option>
                                      <option value="F" <?php if($array_det[0]->genero=='Femenino'){ echo "selected"; }?> >Femenino</option>

                                  </select>
                            </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                            <label><span class="text-req">*</span>Grado escolar</label>
                            <div class="input-group">                                 
                                <input type="number" step="1" class="form-control form-control-sm" name="grado" placeholder="" required="required" value="<?php echo $array_det[0]->grado;?>" > 
                            </div>
                        </div>
                      </div>

                      <div class="col-4">
                        <div class="form-group">
                            <input type="hidden" name="formulario" value="Registrar">
                            <button type="submit" class="btn btn-secondary btn-sm">Modificar</button>
                        </div>
                      </div>
                    </div> <!--row-->
                    </form>
 

<?php
 


}else{

    $accion;
switch ($accion) {
  case 'M':
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
   
  "opcionP" : "general"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
  $response;

$array_det = (json_decode( $response ));
               

    break;

  case 'B':
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
   
  "opcionP" : "activos"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
  $response;

$array_det = (json_decode( $response ));

    break;
  case 'C':
  @$grado=$_POST['grado'];
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
   
  "grado" : "'.$grado.'",
  "opcionP" : "activos x grado"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
  $response;

$array_det = (json_decode( $response ));
?>
 
 <form method="post" action="<?php $_SERVER['DOCUMENT_ROOT'];?>/ExamenRedEfectiva/ACCIONES/Consultas.php?accion=C" >
                      <div class="col-4">
                        <div class="form-group">
                            <label><span class="text-req">*</span>Grado escolar</label>
                            <div class="input-group">                                 
                                <input type="number" step="1" class="form-control form-control-sm" name="grado" placeholder=""     > 
                            </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                            <input type="hidden" name="formulario" value="Registrar">
                            <button type="submit" class="btn btn-secondary btn-sm">Buscar</button>
                        </div>
                      </div>
  </form>
<?php
    break;
  
  default:
    # code...
    break;
}
        //printf ("%s (%s)\n", $fila[0], );
?>
                    <div class="row">
                        
<div class=" table-responsive  ">
  <table class="table  ">
    <thead>
      <tr>
        <th>Matricula</th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Fecha de nacimiento</th>
        <th>Genero</th>
        <th>Grado escolar</th>
        <th>Estatus</th>
        <th>Acción</th>

      </tr>
    </thead>
    <tbody>
    <?php  
       $num=0;
       if(!empty($array_det)){
     foreach($array_det as $row) { $num++; ?>
  <tr>
        <td><?php echo $row->matricula;?></td>
        <td><?php echo $row->nombre;?></td>
        <td><?php echo $row->apellidoP;?></td>
        <td><?php echo $row->apellidoM;?></td>
        <td><?php echo $row->fecha_nac;?></td>
        <td><?php echo $row->genero;?></td>
        <td><?php echo $row->grado;?></td>
        <td><?php echo $row->estatus;?></td>
        <td>
          <?php

          switch ($accion) {
            case 'M': ?>
            <a href="<?php $_SERVER['DOCUMENT_ROOT'];?>/ExamenRedEfectiva/ACCIONES/Consultas.php?accion=M&ID=<?php echo $row->id;?>" class="btn btn-primary">Modificar</a>
            <?php   
              break;
            case 'B': ?>
            <a href="<?php $_SERVER['DOCUMENT_ROOT'];?>/ExamenRedEfectiva/ACCIONES/Consultas.php?accion=B&ID=<?php echo $row->id;?>" onclick="return confirm('Realmente desea dar de baja a el alumno matricula <?php echo $row->matricula;?> '); " class="btn btn-danger">Baja</a>
            <?php   
              break;
            
            default:
              # code...
              break;
          }
          ?>
        </td>
  </tr>
  <?php
  } }
 if(@$num<=0) {?>
<tr>
  <td colspan="9"><div class="alert alert-danger">No se han encontrados resultados</div></td>
</tr>
<?php
        }
 
?>
  </tbody>
  </table>
</div>

                      </div>
 <?php 

 }
include_once("../footer.php");
?>