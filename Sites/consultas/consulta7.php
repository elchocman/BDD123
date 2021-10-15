<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se construye la consulta como un string
 	$query = "SELECT Usuario.username, Sum(Pagos_pelicula.monto) 
     FROM  Usuario, Pagos_pelicula
     WHERE Usuario.id = Pagos_pelicula.id_usuario 
     GROUP BY Usuario.username;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$resultado = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Usuario</th>
      <th>Monto total</th>
    </tr>
  
      <?php
        // echo $pokemones;
        foreach ($resultado as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>