<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "phpmyadmin";
$password = "pro";
$dbname = "usuarios";

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hay errores de conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Consulta SQL para insertar los datos en la tabla "usuarios"
    $sql = "INSERT INTO usuarios (username, password) VALUES ('$username', '$password')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Datos guardados correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<html lang="es">
    
    <head>

        <meta charset="utf-8">
<style>

        body {
            background-image: url('https://fondosmil.com/fondo/27355.jpg');
    background-size: cover;
    font-family: 'Arial', sans-serif;
}

h1 {
    font-size: 30px;
    text-align: center;
    background-image: url('https://1000marcas.net/wp-content/uploads/2022/04/Rick-and-Morty.png');
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    height: 250px

}

form {
    max-width: 300px;
    margin: 0 auto;
    padding: 40px;
    background-color: #fff;
    border-radius: 15px;
}

label {
    display: block;
    margin-bottom: 10px;
}

input[type="text"],
input[type="password"] {
    width: 93%;
    padding: 10px;
    border: none;
    background-color: #444;
    color: #fff;
    margin-bottom: 20px;
}

input[type="submit"] {
    width: 100%;
    padding: 15px;
    background-color: #f2911b;
    color: #fff;
    border: none;
    border-radius: 15px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #f97204;
}

a {
 text-align: center
}
</style>
    </head>
    <body>
<h1>REGISTRARSE</h1>
    <form method="POST" action="signin.php">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br>



        <input type="submit" value="Registrarse">
        <a href="login.php">Volver</a>
    </body>
</html>