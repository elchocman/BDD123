<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $username = $_POST["username"];

 	$query = "SELECT  pelicula.titulo, proveedor.nombre 
   FROM  pelicula, proveedor, proveedor_peliculas, suscripciones, usuario 
   WHERE Upper(usuario.username) Like Upper('%$username%') 
   AND  suscripciones.id_usuario = usuario.id 
   AND  suscripciones.id_proveedor = proveedor.id 
   AND  proveedor_peliculas.id_proveedor = proveedor.id 
   AND  proveedor_peliculas.id_pelicula = pelicula.id;";
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
