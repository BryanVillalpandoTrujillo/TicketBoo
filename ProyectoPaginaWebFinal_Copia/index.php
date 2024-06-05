<?php
    session_start();

    if(isset($_SESSION['usuario'])){
        header("location:inicio.php");
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="header">
        <div class="menu container">
            <a href="#" class="logo">Login</a>
            <input type="checkbox" id="menu" />
            <label for="menu">
                <img src="images/menu.png" class="menu-icono" alt="menu">
            </label>
            <nav class="navbar">
                <ul>
                    <li><a href="registroUsuario.php">Registrarse</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="formulario container">
        <form method="post" autocomplete="off">
            <h2>Iniciar Sesión</h2>

            <?php
            include("conexion.php");
            include("send.php");
            ?>

            <div class="input-group">

                <div class="input-container">
                    <input type="text" name="usuario" id="usuario" placeholder="usuario">
                    <i class="fa-solid fa-user"></i>
                </div>

                <div class="input-container">
                    <input type="password" name="password" id="password" placeholder="contraseña">
                    <i class="fa-solid fa-lock"></i>
                </div>

                <input type="submit" name="iniciar" class="btn" onclick="myFunction()" value="INICIAR">
            </div>
        </form>
    </section>
    <footer class="footer">
    <div class="container">  
        <div class="row align-items-center">
            <div class="col-md-2">
                <a href="#" class="logo">Ticket Boo!</a>
            </div>
            <div class="col-md-2">
                <img src="images/fantasma.webp" alt="fantasma" class="img-fluid"> 
            </div>
            <div class="col-md-8 d-flex justify-content-around"> 
                <ul class="list-unstyled">
                    <li><a href="#"><i class="fa-solid fa-user"></i></a></li>
                </ul>
                <ul class="list-unstyled">
                    <li><a href="#"><i class="fa-solid fa-contact-book"></i></a></li>
                </ul>
                <ul class="list-unstyled">
                    <li><a href="#"><i class="fa-solid fa-phone"></i></a></li>
                </ul>
                <ul class="list-unstyled">
                    <li><a href="#"><i class="fa-solid fa-lock"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</body>
</html>