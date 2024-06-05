<?php
    if(!session_start()){
        session_start();
    }
    

    if(isset($_SESSION['usuario'])){
        header("location:inicio.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <div class="menu container">
            <a href="#" class="logo">registro</a>
            <input type="checkbox" id="menu" />
            <label for="menu">
                <img src="images/menu.png" class="menu-icono" alt="menu">
            </label>
            <nav class="navbar">
                <ul>
                    <li><a href="index.php">Login</a></li>
                </ul>
            </nav>
        </div>    
    </header>
    
    <section class="formulario container">
        <form method="post" autocomplete="off">
            <h2>Registro</h2>
            <div class="input-group">

                <?php
                include("conexion.php");
                include("send.php");
                ?>

                <div class="input-container">
                    <input type="text" name="name" id="nombre" placeholder="Nombres" required>
                    <i class="fa-solid fa-user"></i>
                </div>

                <div class="input-container">
                    <input type="text" name="apellido" id="apellido" placeholder="Apellidos" require>
                    <i class="fa-solid fa-user"></i>
                </div>

                <div class="input-container">
                    <input type="text" name="ciudad" id="ciudad" placeholder="Ciudad">
                    <i class="fa-solid fa-city"></i>
                </div>

                <div class="input-container">
                    <input type="text" name="codigoPostal" id="codigoPostal" placeholder="Codigo Postal">
                    <i class="fa-solid fa-tag"></i>
                </div>


                <div class="input-container">
                    <input type="tel" name="phone" id="Telefono Celular" placeholder="Telefono">
                    <i class="fa-solid fa-phone"></i>
                </div>

                <div class="input-container">
                    <input type="email" name="email" id="Correo" placeholder="email">
                    <i class="fa-solid fa-envelope"></i>
                </div>

                <div class="input-container">
                    <input type="text" name="usuario" id="usuario" placeholder="usuario">
                    <i class="fa-solid fa-user"></i>
                </div>

                <div class="input-container">
                    <input type="password" name="password" id="password" placeholder="contraseña">
                    <i class="fa-solid fa-phone"></i>
                </div>

                <input type="submit" name="registroUsuario" class="btn" onclick="myFunction()">
            </div>
        </form>
    </section>

    <footer class="footer">
        <div class="footer-content container">
            <div class="link">
                <a href="#" class="logo">Ticket Boo!</a>
            </div>

            <div class="link">
                <img src="images/fantasma.webp" alt="fantasma">
            </div>
            
            <div class="link">
                <ul>
                    <li><a href="#"></a></li>    
                    <i class="fa-solid fa-user"></i>
                </ul>
            </div>

            <div class="link">
                <ul>
                    <li><a href="#"></a></li>    
                    <i class="fa-solid fa-contact-book"></i>
                </ul>
            </div>

            <div class="link">
                <ul>
                    <li><a href="#"></a></li>    
                    <i class="fa-solid fa-phone"></i>
                </ul>
            </div>

            <div class="link">
                <ul>
                    <li><a href="#"></a></li>    
                    <i class="fa-solid fa-lock"></i>
                </ul>
            </div>
        </div>
    </footer>

    
</body>
</html>