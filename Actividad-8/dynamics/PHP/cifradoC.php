<?php
echo "<!DOCTYPE html>
  <html lang='es' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <title>Profesor/funcionario</title>
    <style>
      body{
        background-color:rgb(123, 208, 129);
        width: 50%;
        margin: 0 auto;
        text-align: center;
        font-size: 18px;
      }
      h2{
        color:rgb(28, 62, 44);
      }
    </style>
  </head>
  <body>";
    $texto=(isset($_POST['texto']) && !is_numeric($_POST['texto']))? $_POST['texto']:'0';
    if($texto == '0'){ //Verifica que exista un mensaje
      header('Location:/templates/cifradoC.html');
    }else{
      $uno=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V'
      ,'W','X','Y','Z','.',',','?','¿'];
      $dos=['L','M','N','O','P','Q','R','S','T','U','V'
      ,'W','X','Y','Z','.',',','?','¿','A','B','C','D','E','F','G','H','I','J','K'];
      $esp=['Á','É','Í','Ó','Ú','Ñ'];
      $texto=mb_strtoupper($texto);
      $textoEsp= preg_match_all('/[ÁÉÍÓÚÑ]/',$texto);
      if($textoEsp==true){ //En caso de caracteres especiales
          header('Location:/templates/cifradoC.html');
      }else{
        $textoCif=str_replace($uno, $dos, $texto);
        echo "<br><h2>Texto cifrado: ".$textoCif."</h2>";
      }
    }
    echo "</br></br><a href='../../../templates/cifradoC.html'>Regresar</a>";
echo "</body>
    </html>";
?>
