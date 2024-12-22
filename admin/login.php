<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../styles/main.css">
</head>

<body>
  <section class="section_form">

    <form action="comparacion.php" method="post">
      <div class="wrapper">
        <h2>Login</h2>
        <br>
        <div class="input-field">
          <p>Usuario</p>
          <input type="text" name="nom_admin" required>
        </div>
        <div class="input-field">
          <p>Contraseña</p>
          <input type="password" name="contr_admin" required>
        </div>
        <br>
        <button type="submit">Entrar</button>
        <button type="button"><a href="../index.php"
            onclick="return confirm('¿Estás seguro de que desea salir?')">Cancelar</a></button>
      </div>
    </form>
  </section>

</body>

</html>