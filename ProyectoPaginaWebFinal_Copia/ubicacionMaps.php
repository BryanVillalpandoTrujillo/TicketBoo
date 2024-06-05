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
    <title>Ubicación eventos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <div class="menu container">
            <a href="#" class="logo">Ubicación eventos</a>
            <input type="checkbox" id="menu" />
            <label for="menu">
                <img src="images/menu.png" class="menu-icono" alt="menu">
            </label>
            <nav class="navbar">
                <ul>
                    <li><a href="inicio.php">Inicio</a></li>
                    <li><a href="perfil.php">Perfil</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="formulario container">
        <div class="map" id="map"></div>
    </section>

    <section class="formulario container">
        <div class="input-group">
            <select id="coords-select" class="input">
                <?php
                include("conexion.php");
                $eventos = 'Select * from evento';
                $resultado=mysqli_query($conex, $eventos);
                while($valores = mysqli_fetch_array($resultado)){
                    echo '<option value="'.$valores['latitud'].', '.$valores['longitud'].'">'.$valores['id_evento'].'.-'.$valores['nombre'].'</option>';
                }
                ?>
                <!-- Add more options as needed -->
            </select>
            <button id="submit-btn" class="btn">Mostrar en el mapa</button>
        </div>
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

    <?php
        include("send.php");
    ?>

    <script type="module" src="./main.js"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAet6BC3A-TE6toXKEFBxLcFYscszuNKFw&libraries=places&callback=initMap"
      defer
    ></script>
</body>
</html>