<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $n = $_POST["n"];

 	$query = "SELECT serie.titulo FROM serie, temporada
      WHERE temporada.numero >= $n
      AND temporada.id_serie = serie.id_serie;";
	$result = $db -> prepare($query);
	$result -> execute();
	$resultado = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Titulo</th>
      <th>Proveedor</th>

    </tr>
  <?php
	foreach ($resultado as $p) {
  		echo "<tr><td>$p[0]</td><td>$p[1]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
