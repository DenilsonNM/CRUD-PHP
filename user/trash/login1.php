<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login user</title>
  <link rel="stylesheet" href="../styles/user.css">
</head>

<body>




<div class="container">
    <h2>Registro de Usuario</h2>
    <form id="registerForm">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" required>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" required>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" required>

        <button type="submit">Registrar</button>
    </form>

    <p id="resultado"></p>
</div>

<script src="script.js"></script>


</body>
</html>
