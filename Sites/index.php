<?php include('templates/header.html');   ?>

<body>
  <h1 align="center">Plataforma de streaming </h1>
  <p style="text-align:center;">Aquí podrás encontrar información sobre tu plataforma de streaming.</p>

  <br>

  <h3 align="center"> ¿Quieres ver todas las peliculas junto con sus proveedores, siempre y cuando el proveedor las ofrezca de manera gratuita?</h3>
  Titulo:
  <form align="center" action="consultas/consulta1.php" method="post">
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> ¿Todas las peliculas/series con su proveedor? Insertar titulo de la pelicula/serie</h3>

  <form align="center" action="consultas/consulta3.php" method="post">
    Titulo:
    <input type="text" name="titulo">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> ¿Todas las peliculas disponibles para el usuario? Inserte username del usuario</h3>

  <form align="center" action="consultas/consulta5.php" method="post">
    Username:
    <input type="text" name="username">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> ¿Todas las peliculas que pertenecen al genero? Inserte genero</h3>

  <form align="center" action="consultas/consulta5.php" method="post">
    genero:
    <input type="text" name="genero">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <br>
</body>
</html>
