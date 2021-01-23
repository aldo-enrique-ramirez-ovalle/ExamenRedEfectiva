<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Aldo Enrique Ramírez Ovalle">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/regular.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/solid.css">

    <title>Examen Red Efectiva</title>
    <style>
      .text-req{
        color:red;
      }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
      <div class="navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php"><strong>Examen Red Efectiva</strong><span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>

<div class="nav-scroller bg-white shadow-sm">
  <nav class="nav nav-underline">
    <a class="nav-link active" href="#">.</a>
  </nav>
</div>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-12">
          <div class="col-md-12">
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0"></h6>
        <div class="media text-muted pt-3">
          <div class="row">
                  <div class="col-12">
                    <div class="form-group  " >
                      <a href="<?php $_SERVER['DOCUMENT_ROOT'];?>/ExamenRedEfectiva/ACCIONES/Registro.php" type="button" class="btn btn-secondary btn-sm">Registro de alumno</a>
                      <a href="<?php $_SERVER['DOCUMENT_ROOT'];?>/ExamenRedEfectiva/ACCIONES/Consultas.php?accion=M" type="button" class="btn btn-secondary btn-sm">Modificación de datos de alumno</a>
                      <a href="<?php $_SERVER['DOCUMENT_ROOT'];?>/ExamenRedEfectiva/ACCIONES/Consultas.php?accion=B" type="button" class="btn btn-secondary btn-sm">Baja de alumno</a>
                      <a href="<?php $_SERVER['DOCUMENT_ROOT'];?>/ExamenRedEfectiva/ACCIONES/Consultas.php?accion=C" type="button" class="btn btn-secondary btn-sm">Listado de alumnos por grado</a>
                      <a href="<?php $_SERVER['DOCUMENT_ROOT'];?>/ExamenRedEfectiva/ACCIONES/Totales.php?accion=T" type="button" class="btn btn-secondary btn-sm">Total de alumnos por grado</a>
                    </div>
                  </div>
                  <div class="container">
                  <div class="col-12" id="Formularios">
<?php 
$mysqli = new mysqli("localhost", "root", "", "examenredefectiva");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
  $mysqli->host_info . "\n";
?>