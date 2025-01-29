<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
</head>

<body>
  <section>
    <form action="correo_validacion.php" method="post">
      <h2>Registro</h2>
      <p>Nombre</p>
      <input type="text" name="nombre_user" required>
      <p>Edad</p>
      <input type="text" name="edad_user" required>
      <p>Correo electrónico</p>
      <input type="text" name="correo_user" required>
      <br><br>
      <button type="submit">Registrarse</button>
      <button type="button"><a href="../index.php"
          onclick="return confirm('¿Estás seguro de que desea salir?')">Salir</a></button>
    </form>
  </section>
</body>

</html>