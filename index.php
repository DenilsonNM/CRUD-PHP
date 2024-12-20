<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido</title>
  <link rel="stylesheet" href="styles/main.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="lib/responsiveslides.min.js"></script>
</head>

<body>

  <?php
  include "header_menu.php"
  ?>

  <section class="section_slides">
    <ul class="rslides">
      <li><img src="img/tec1.jpg" alt=""></li>
      <li><img src="img/tec2.jfif" alt=""></li>
      <li><img src="img/tec3.jpg" alt=""></li>
    </ul>
  </section>

  <?php
  include "footer.php"
  ?>

  <script>
    $(function() {
      $(".rslides").responsiveSlides();
    });
  </script>

</body>

</html>