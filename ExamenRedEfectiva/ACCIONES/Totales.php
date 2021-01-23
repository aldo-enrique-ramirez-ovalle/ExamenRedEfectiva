 <?php
include_once("../header.php"); 

@$ID=$_GET['ID'];
@$accion=$_GET['accion'];

 
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
   
 "opcionP" : "reporte"
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
 
 
<?php
        //printf ("%s (%s)\n", $fila[0], );
?>
                    <div class="row">
                        
<div class=" table-responsive  ">
  <table class="table  ">
    <thead>
      <tr>
       
        <th>Grado escolar</th>
        <th>Estatus</th>
        <th>Total de alumnos</th>
       

      </tr>
    </thead>
    <tbody>
    <?php  $num=0;
       if(!empty($array_det)){
     foreach($array_det as $row) { $num++; ?>
  <tr>
        <td><?php echo $row->grado;?></td>
        <td><?php echo $row->estatus;?></td>
        <td><?php echo $row->TOTAL_ALUMNOS;?></td>
         
  </tr>
  <?php
  }
} if($num<=0) {?>
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

 
include_once("../footer.php");
?>