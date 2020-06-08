<?php
  echo "<!DOCTYPE html>
  <html lang='es' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <title>Profesor/funcionario</title>
    <style>
      body{
        background-color:Cornflowerblue;
        width: 50%;
        margin: 0 auto;
        text-align: center;
        font-size: 18px;
      }
    </style>
  </head>
  <body>";
    $validacion=0;
    $nom=(isset($_POST['nombre']) && $_POST['nombre']!='')?$_POST['nombre']:'0';
    $apPat=(isset($_POST['apellidoPat']) && $_POST['apellidoPat']!='')?$_POST['apellidoPat']:'0';
    $apMat=(isset($_POST['apellidoMat']) && $_POST['apellidoMat']!='')?$_POST['apellidoMat']:'0';
    $col=(isset($_POST['colegio']) && $_POST['colegio']!='')?$_POST['colegio']:'0';
    $fecha=(isset($_POST['fecha']) && $_POST['fecha']!='')?$_POST['fecha']:'0';
    $usu=(isset($_POST['usuario']) && $_POST['usuario']!='')?$_POST['usuario']:'0';
    $con=(isset($_POST['contraseña']) && $_POST['contraseña']!='')?$_POST['contraseña']:'0';
    $nomValid= preg_match_all('/^([A-ZÁÉÍÓÚ]{1}[áéíóúa-z]+|[A-ZÁÉÍÓÚ]{1}[áéíóúa-z]+ [A-ZÁÉÍÓÚ]{1}[áéíóúa-z]+)$/',$nom);
    $apPatValid= preg_match_all('/^[A-ZÁÉÍÓÚ]{1}[áéíóúa-z]+$/',$apPat);
    $apMatValid= preg_match_all('/^[A-ZÁÉÍÓÚ]{1}[áéíóúa-z]+$/',$apMat);
    $fechaValid= preg_match_all('/^(19[2-9][0-9]|20(0[0-9]|1[012]))-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[012])$/',$fecha);
    $usuValid= preg_match_all('/([A-Z]{4}|[A-Z]{5})\d{2}(0[1-9]|1[012])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[0-9A-Z]{3}$/',$usu);
    $conValid= preg_match_all('/^((?=\S*[A-Z])(?=\S*[a-z])(?=\S*\d)(?=\S*[@$&%#!¡?¿.,]))\S{10,30}$/',$con);

    $conInseguras=['123456','password','Password','contraseña','qwerty','12345','letmein','welcome','dragon'];
    $valid=0;
    foreach ($conInseguras as $key => $value) {
      if($value==$con){
        $valid+=1;
      }
    }
    if($valid>0){
      echo "<br>Su contraseña <strong>".$con."</strong> es muy insegura";
      $validacion+=1;
    }elseif($conValid==false){
      echo "<br>Su contraseña <strong>".$con."</strong> es insegura";
      echo "Asegúrate de que sea mayor a 10 caracteres, y que tenga al menos
      una mayúscula, una minúsucula, un número y un carácter especial";
      $validacion+=1;
    }if ($nomValid==false) {
      echo "<br>Nombre inválido: <strong>".$nom."</strong>";
      $validacion+=1;
    }if($apPatValid==false){
      echo "<br>Apellido inválido: <strong>".$apPat."</strong>";
      $validacion+=1;
    }if($apMatValid== false){
      echo "<br>Apellido inválido: <strong>".$apMat."</strong>";
      $validacion+=1;
    }if($fechaValid==false){
      echo "<br>Fecha inválida: <strong>".$fecha."</strong>";
      echo "<br>Mínimo 12 años";
      $validacion+=1;
    }if($usuValid==false){
      echo "<br>RFC inválido: <strong>".$usu."</strong>";
      $validacion+=1;
    }if($validacion==0){
      echo "<br>Datos correctos";
    }

    echo "</br></br><a href='../../../templates/actividad_7.1.html'>Regresar</a>";
  echo "</body>
  </html>";
?>
