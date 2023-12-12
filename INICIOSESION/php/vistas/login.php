<!-- Formulario de inicio de sesión -->
<h1>INICIO DE SESIÓN</h1>
<form action="?control=userController&metodo=login" method="post">
    <label for="correo">Correo:</label>
    <input type="text" name="correo">
    <label for="contrasena">Contraseña:</label>
    <input type="password" name="contrasena">
    <input type="submit" value="Iniciar Sesión">
</form>