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


// Check if the user has submitted the form
if (isset($_POST['usuario']) && isset($_POST['password'])) {
    // Get the submitted username and password
    $username = $_POST['usuario'];
    $password = $_POST['password'];

    // Create a query to check if the user exists in the database
    $query = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);

    // Check if the user exists
    if (mysqli_num_rows($results) == 1) {
        // The user exists, start a session and redirect to the home page
        session_start();
        $_SESSION['username'] = $username;
        header('location: home.php');
    } else {
        // The user does not exist, show an error message
        echo 'El email o password es incorrecto, <a href="index.php">vuelva a intenarlo</a>.<br/>';
    }
}


// Comprobación de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];
    if (isset($usuariosValidos[$usuario]) && $usuariosValidos[$usuario] === $contrasena) {
        // Inicio de sesión exitoso
        echo "¡Bienvenido, $usuario! Has iniciado sesión correctamente.";
    } else {
        // Credenciales inválidas
        echo "Usuario o contraseña incorrectos. Por favor, inténtalo nuevamente.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
    <h1>INICIAR SESION</h1>
    <form method="POST" action="/p/index.html">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br>



        <input type="submit" value="Iniciar sesión">
        
        <a href="signin.php">Registrarse</a>    
</form>


</body>
</html>