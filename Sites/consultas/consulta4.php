<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $genero = $_POST["genero"];

 	$query = "SELECT pelicula.titulo 
      FROM pelicula, genero, subgenero
      WHERE UPPER(pelicula.genero) LIKE UPPER('%$$genero%')
      OR UPPER(subgenero.nombre) LIKE UPPER('%$$genero%')
      AND subgenero.id_genero = genero.id_genero
      AND genero.nombre = pelicula.genero";
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
