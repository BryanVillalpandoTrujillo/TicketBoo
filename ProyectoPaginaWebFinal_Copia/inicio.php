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
    <title>Inicio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <header class="header">
        <div class="menu container">
            <a href="#" class="logo">Eventos Disponibles</a>
            <input type="checkbox" id="menu" />
            <label for="menu">
                <img src="images/menu.png" class="menu-icono" alt="menu">
            </label>

            <?php
            include("clima.php");
            ?>

            <nav class="navbar">
                <ul>
                <li><a href="ubicacionMaps.php">Ubicaciones</a></li>
                    <li><a href="eventos.php">Mis eventos</a></li>
                    <li><a href="perfil.php">Perfil</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
        <div class="header-content container">
            <?php
            include("conexion.php");
            
            $consulta = "select * from evento";
            $resultado = mysqli_query($conex, $consulta);
            if ($resultado) {
                while($row = $resultado -> fetch_array()){
                    $id_evento = $row['id_evento'];
                    $nombre = $row['nombre'];
                    $fecha = $row['fecha'];
                    $hora = $row['hora'];
                    $lugar = $row['lugar'];
                    $cupo = $row['cupo'];
                    ?>
                    <div class="evento">
                        <div class="evento-txt">
                            <h1><?php echo $nombre; ?></h1>
                            <div>
                                <p>
                                    <b>ID: </b><?php echo $id_evento; ?><br>
                                    <b>fecha: </b><?php echo $fecha; ?><br>
                                    <b>hora: </b><?php echo $hora; ?><br>
                                    <b>lugar: </b><?php echo $lugar; ?><br>
                                    <b>cupo: </b><?php echo $cupo; ?><br>
                                </p>
                            </div>
                        </div>

                        <div class="btn-registro">
                            <a href="registro.php" class="btn-1">Registrate</a>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>


    
    <footer class="footer">
        <div class="footer-content container">
        <div class="row align-items-center">
            <div class="col-md-2">
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