<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $titulo = $_POST["titulo"];

 	$query = "SELECT pelicula.titulo, proveedor.nombre FROM pelicula, proveedor_peliculas, proveedor
      where pelicula.titulo = $titulo and proveedor_peliculas.id_proveedor = proveedor.id
      and proveedor_peliculas.id_pelicula = pelicula.id
      UNION
      SELECT serie.titulo, proveedor.nombre FROM serie, proveedor_series, proveedor
      where serie.titulo = $titulo and proveedor_series.id_proveedor = proveedor.id
      and proveedor_series.id_pelicula = serie.id;";
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
