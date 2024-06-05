<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        echo '
            <script>
                alert("Por favor inicie sesión");
                window.location = "index.php";
            </script>
        ';
        session_destroy();
        die();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <header class="header">

        <div class="menu container">
            <a href="#" class="logo">Mi perfil</a>
            <input type="checkbox" id="menu" />
            <label for="menu">
                <img src="images/menu.png" class="menu-icono" alt="menu">
            </label>
            <nav class="navbar">
                <ul>
                    <li><a href="cerrarSesion.php">Cerrar Sesión</a></li>
                    <li><a href="eventos.php">Mis eventos</a></li>
                    <li><a href="inicio.php">Inicio</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="header-content container">
        <?php
        include("conexion.php");

        if (isset($_SESSION['usuario'])) {
            $user = $_SESSION['usuario'];

            $consulta = "SELECT * FROM cliente WHERE usuario='" . $user . "'";
            $resultado = $conex->query($consulta);

            while ($row = $resultado->fetch_assoc()) {
                $id_cliente = $row['id_cliente'];
                $nombre = $row['nombre'];
                $apellido = $row['apellido'];
                $ciudad = $row['ciudad'];
                $codigoPostal = $row['codigo_postal'];
                $telefono = $row['telefono'];
                $email = $row['email'];
                $usuario = $row['usuario'];
                ?>
                <div class="evento">
                    <div class="evento-txt">
                        <h1><?php echo $nombre." ".$apellido; ?></h1>
                        <div>
                            <p>
                                <b>ID: </b><?php echo $id_cliente; ?><br><br>
                                <b>Ciudad: </b><?php echo $ciudad; ?><br><br>
                                <b>Codigo Postal: </b><?php echo $codigoPostal; ?><br><br>
                                <b>Telefono: </b><?php echo $telefono; ?><br><br>
                                <b>Email: </b><?php echo $email; ?><br><br>
                                <b>Usuario: </b><?php echo $usuario; ?><br>
                            </p>
                        </div>
                    </div>

                    <div class="evento-img">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "No has iniciado sesión. Por favor, inicia sesión primero.";
        }
        ?>
    </div>
    

    
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