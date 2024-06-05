<?php
include("conexion.php");

    if (isset($_POST['send'])) {
        if (
            strlen($_POST['id_cliente']) >= 1 &&
            strlen($_POST['id_evento']) >= 1
        ) {
            $id_cliente = trim($_POST['id_cliente']);
            $id_evento = trim($_POST['id_evento']);
            // Verificar si hay cupo disponible (consulta optimizada)
            $sql_cupo = "SELECT cupo, 
                            (SELECT COUNT(*) FROM registro WHERE id_evento = '$id_evento') AS registros_actuales
                        FROM evento 
                        WHERE id_evento = '$id_evento'";
            $resultado_cupo = mysqli_query($conex, $sql_cupo);

            if ($resultado_cupo && $datos_cupo = mysqli_fetch_assoc($resultado_cupo)) {
                if ($datos_cupo['cupo'] > $datos_cupo['registros_actuales']) {
                    // Verificar si el cliente ya está registrado
                    $sql_duplicados = "SELECT * FROM registro WHERE id_cliente = '$id_cliente' AND id_evento = '$id_evento'";
                    $resultado_duplicados = mysqli_query($conex, $sql_duplicados);

                    if (mysqli_num_rows($resultado_duplicados) == 0) { // No está registrado
                        // Insertar registro
                        $consulta = "INSERT INTO registro (id_cliente, id_evento) VALUES ('$id_cliente','$id_evento')";
                        mysqli_query($conex, $consulta);

                        // Disminuir cupo
                        $nuevo_cupo = $datos_cupo['cupo'] - 1;
                        $sql_actualizar_cupo = "UPDATE evento SET cupo = '$nuevo_cupo' WHERE id_evento = '$id_evento'";
                        mysqli_query($conex, $sql_actualizar_cupo);

                        echo '<div class="correcto">Registrado con éxito</div>';
                    } else {
                        echo '<div class="alerta">Ya estás registrado en este evento</div>';
                    }
                } else {
                    echo '<div class="alerta">No hay cupo disponible para este evento</div>';
                }
            } else {
                echo '<div class="alerta">Error al verificar el cupo del evento</div>';
            }
        } else {
            echo '<div class="alerta">Por favor, completa todos los campos</div>';
        }
    }

if(!empty($_POST['iniciar'])){
    if(empty($_POST["usuario"]) and empty($_POST["password"])){
        echo '<div class="alerta">Los Campos estan vacios</div>';
    }
    else{
        $usuario=$_POST["usuario"];
        $password=$_POST["password"];
        $sql=$conex->query(" select * from cliente where usuario='$usuario' and contrasena='$password' ");
        if (mysqli_num_rows($sql) > 0) {
            $_SESSION['usuario']=$usuario;
            header("location:inicio.php");
            exit;
        } else {
            echo '<div class="alerta">Acceso denegado</div>';
        }
    }
}

if(!empty($_POST['registroUsuario'])){
    if(empty($_POST["name"]) or empty($_POST["apellido"]) or empty($_POST["phone"])
    or empty($_POST["ciudad"]) or empty($_POST["codigoPostal"]) or empty($_POST["email"]) 
    or empty($_POST["usuario"]) or empty($_POST["password"])){
        echo '<div class="alerta">Los Campos estan incompletos</div>';
    }
    else{
        $usuario=$_POST["usuario"];
        $password=$_POST["password"];
        $sql=$conex->query(" select * from cliente where usuario='$usuario'");
        if ($datos=$sql->fetch_object()) {
            echo '<div class="alerta">Usuario ya existe</div>';
        } else {
            $name = trim($_POST['name']);
            $apellido = trim($_POST["apellido"]);
            $ciudad = trim($_POST["ciudad"]);
            $codigoPostal = trim($_POST["codigoPostal"]);
            $phone = trim($_POST['phone']);
            $email = trim($_POST['email']);
            $usuario= trim($_POST["usuario"]);
            $password= trim($_POST["password"]);
            $consulta = "INSERT INTO cliente(nombre, apellido, ciudad, codigo_postal, telefono, email, usuario, contrasena) 
            VALUES ('$name', '$apellido','$ciudad','$codigoPostal', '$phone','$email','$usuario', '$password') ";
            $resultado = mysqli_query($conex, $consulta);
            echo '<div class="correcto">Registrado con exito</div>';
        }
        
    }
}


if(isset($_POST['seleccion'])){
    if( 
        strlen($_POST['id_evento']) >= 1 
    ){
        $id_evento = trim($_POST['id_evento']);
        $consulta = "SELECT latitud, longitud FROM evento WHERE id_evento = '$id_evento' ";
        $resultado = $conex->query($consulta);

        while($row=$resultado->fetch_assoc()){
            $latitud = $row['latitud'];
            $longitud = $row['longitud'];
        }
    }
}

#header('Content-Type: application/json');
#echo json_encode(['latitud' => $latitud, 'longitud' => $longitud]);

?>