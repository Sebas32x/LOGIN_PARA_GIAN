<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body class = "contenedor">
<?php

if (include("conexion.php"))
{
    $correoIngresado = $_POST["email"];
    $contraseñaIngresada = $_POST["password"];
    
    $sql = "CALL REGISTRAR_USUARIO('$correoIngresado', '$contraseñaIngresada')";
    
    // 3. Recuperar el valor del parámetro OUT
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        $resultado = $conn->query($sql);
        echo "<div class = 'login-container'>";
        echo "OK. Ahora ya es un usuario registrado, ya puede inciar sesion <br>";
        echo "<a href='login.html'> LogIn </a>";
        echo "</div>";
            

    } catch (mysqli_sql_exception $e) {
        $error = $e->getMessage();
        if (str_contains($error, "Duplicate entry"))
        {
            echo "<div class = 'login-container'>";
            echo "Ese correo electronico ya ha sido registrado <br>";
            echo "<a href='sigin.html'> volver </a>";
            echo "</div>";
        }
    }


/*
    if($fila['total_out'] > 0)
    {
        echo "ok, inicio de sesion exitoso. aguarde un momento ";
        echo $fila['total_out'];
    }
    else
    {
        echo "contraseña o correo incorrectos";
        echo "<a href='index.html'> <button> volver </button> </a>";
    }
*/
}
?>    
</body>
</html>