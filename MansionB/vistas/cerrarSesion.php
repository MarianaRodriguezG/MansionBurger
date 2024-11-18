<?php
session_start();
if (isset($_SESSION['carrito'])) {
    unset($_SESSION['carrito']); // Limpiar el carrito
}
session_unset(); // Destruye todas las variables de sesión
session_destroy(); // Destruye la sesión

// Redirigir al usuario a la página de inicio de sesión o a la página principal
header("Location: index.php");
exit();
?>
