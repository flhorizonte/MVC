<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>santri</title>

    <link rel="stylesheet" href="src/App/Resources/static/css/w3.css">
    <link rel="stylesheet" href="src/App/Resources/static/css/santri.css">
    <link rel="stylesheet" href="src/App/Resources/static/css/toastr.css">

    <link rel="stylesheet" href="src/App/Resources/static/css-awesome/brands.css">
    <link rel="stylesheet" href="src/App/Resources/static/css-awesome/fontawesome.css">
    <link rel="stylesheet" href="src/App/Resources/static/css-awesome/regular.css">
    <link rel="stylesheet" href="src/App/Resources/static/css-awesome/solid.css">
    <link rel="stylesheet" href="src/App/Resources/static/css-awesome/svg-with-js.css">
    <link rel="stylesheet" href="src/App/Resources/static/css-awesome/v4-shims.css">

    <style>
      #login {
        max-width: 95%;
        margin: auto;
        width: 380px;
        margin-top: 5%;
      }

      #logo-cliente {
        max-width: 100%;
        margin: auto;
        width: 700px;    
      }

      #logo-santri {
        max-width: 50%;
        margin: auto;
        width: 380px;    
      }
    </style>

  </head>
  <body>
    <script src="src/App/Resources/static/js/jquery.js"></script>

    <?php
        $kernel->view();
    ?>
  </body>
</html>