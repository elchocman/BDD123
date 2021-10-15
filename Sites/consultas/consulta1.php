<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se construye la consulta como un string
 	$query = "SELECT pelicula.titulo, proveedor.nombre 
   FROM  pelicula, proveedor, proveedor_peliculas 
   WHERE  proveedor.costo = 0 
   AND  proveedor_peliculas.id_proveedor = proveedor.id 
   AND  proveedor_peliculas.id_pelicula = pelicula.id;";

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
