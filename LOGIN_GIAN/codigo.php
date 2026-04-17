<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body class="contenedor">
<?php

if (include("conexion.php")) {
    $correoIngresado = $_POST["email"];
    $contraseñaIngresada = $_POST["password"];
    
    $sql = "CALL COMPROBAR_USUARIO('$correoIngresado', '$contraseñaIngresada', @total)";
    $conn->query($sql);
    // 3. Recuperar el valor del parámetro OUT
    $resultado = $conn->query("SELECT @total AS total_out");
    $fila = $resultado->fetch_assoc();
    if($fila['total_out'] > 0)
    {
        echo "<div class = 'login-container'>";
        echo "ok, inicio de sesion exitoso. Puede seguir ";
        echo "<a href='https://www.argentina.gob.ar'> Continue </a>";
        echo "</div>";
    }
    else
    {
        echo "<div class = 'login-container'>";
        echo "contraseña o correo incorrectos";
        echo "<a href='index.html'> <button> volver </button> </a>";
        echo "</div>";
    }

}
?>    
</body>
</html>