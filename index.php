<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mi UVA</title>
  </head>
  <body>

<h1>MiUVA</h1>
<h2>BCRA UVA TEST</h2>

<form class="" action="index.php" method="post">
Valor de cuota en UVAs:<br>
<input type="text" name="cuota" value="">
<button type="submit" value="Submit">Submit</button>

</form>
<br>




  </body>
</html>


<?php


$uva_json = file_get_contents('https://www.quandl.com/api/v3/datasets/BCRA/MVAR_CVS.json?api_key=nC9UCjEyhYM3BFkvARZS');

$uva_obj = json_decode($uva_json, true);

$datos=$uva_obj["dataset"]['data'];







if (isset($_POST["cuota"])){
  $cuotauva = $_POST["cuota"];
  echo "<h3>Tu cuota es de " . $cuotauva . " UVAs por mes.</h3>";
  echo "<br>";
  echo "<br>";
}

foreach ($datos as $count => $pordia)
{


  $fecha = explode("-", $pordia[0]);
  $anio = $fecha[0];
  $mes = $fecha[1];
  $dia = $fecha[2];


if ($dia=='10' & ($anio == '2018' or $anio == '2017')) {

  echo "Fecha: " . $anio . "/" . $mes. "/" . $dia;
  echo " Valor: " . number_format($pordia[1], 2);
  if (isset($_POST["cuota"])){
    echo " Cuota: " . number_format(($pordia[1] * $cuotauva), 2);}
  echo "<br>";
  echo "<br>";

}}


?>
