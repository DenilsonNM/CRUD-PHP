<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <section>
    <form action="comparacion_user.php" method="post">
      <h2>Login</h2>
      <p>Usuario</p>
      <input type="text" name="nom_admin" required>
      <p>Contraseña</p>
      <input type="password" name="contr_admin" required>

      <button type="submit">Entrar</button>
      <p>¿No tienes una cuenta? <a href="registro_user.php">Registrate aquí</a></p>
      <button type="button"><a href="../index.php"
          onclick="return confirm('¿Estás seguro de que desea salir?')">Salir</a></button>
    </form>
  </section>
</body>

</html>