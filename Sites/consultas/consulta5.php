<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $username = $_POST["username"];

 	$query = "SELECT  Pelicula.titulo, Proveedor.nombre FROM  Pelicula, Proveedor, Proveedor_pelicula, Suscripciones, Usuario WHERE  Usuario.username = $username AND  Suscripciones.id_usuario = Usuario.id AND  Suscripciones.id_proveedor = Proveedor.id AND  Proveedor_peliculas.id_proveedor = Proveedor.id AND  Proveedor_peliculas.id_pelicula = Pelicula.id;";
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
