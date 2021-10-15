<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se construye la consulta como un string
 	$query = "SELECT Pelicula.titulo, Proveedor.nombre FROM  Pelicula, Proveedor, Proveedor\_peliculas WHERE  Proveedor.costo = 0 AND  Proveedor_peliculas.id_proveedor = Proveedor.id AND  Proveedor_peliculas.id_pelicula = Pelicula.id;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$resultado = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Titulo pelicula</th>
      <th>Nombre proveedor</th>
    </tr>
  
      <?php
        // echo $pokemones;
        foreach ($resultado as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>
