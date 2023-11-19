<?php
// Iniciar la sesión
require_once 'db.php';
session_start();

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar las credenciales del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
    
    $sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   $correo = $row['correo'];
   $contrasena = $row['contrasena'];
   
   if ($email === $correo && $password === $contrasena) {
        // Credenciales válidas, iniciar sesión
        $_SESSION['usuarios'] = $email;

        // Redirigir a la página de inicio después del inicio de sesión
        header("Location: index.php");
        exit();
    } else {
        // Credenciales inválidas, mostrar mensaje de error
        echo "Usuario o contraseña incorrectos.";
    }
  }
} else {
  echo "0 results";
}
$conn->close();

    // Validar las credenciales (en un sistema real, esto debería hacerse de manera más segura, por ejemplo, consultando una base de datos)
//    if ($email === 'usuarioEjemplo' && $password === 'contrasenaEjemplo') {
        // Credenciales válidas, iniciar sesión
//        $_SESSION['usuarios'] = $email;

        // Redirigir a la página de inicio después del inicio de sesión
//        header("Location: index.php");
//        exit();
//    } else {
        // Credenciales inválidas, mostrar mensaje de error
//        echo "Usuario o contraseña incorrectos.";
//    }
}

?>
