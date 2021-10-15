<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $titulo = $_POST["titulo"];

 	$query = "SELECT Pelicula.titulo, Proveedor.nombre FROM Pelicula, Proveedor_peliculas, Proveedor
      where Pelicula.titulo = $titulo and Proveedor_peliculas.id_proveedor = Proveedor.id
      and Proveedor_peliculas.id_pelicula = Pelicula.id
      UNION
      SELECT Series.titulo, Proveedor.nombre FROM Series, Proveedor_series, Proveedor
      where Series.titulo = $titulo and Proveedor_series.id_proveedor = Proveedor.id
      and Proveedor_series.id_pelicula = Series.id;";
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
