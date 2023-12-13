<h1>ALTA ADMINS</h1>
<form action="?control=adminController&metodo=altaAdmin" method="post">
    <label for="correo">Correo:</label>
    <input type="text" name="correo">
    <br>
    <label>Administrará el juego:</label>
    <label>1</label>
    <input type="radio" name="perfil" value="1">
    <label>2</label>
    <input type="radio" name="perfil" value="2">
    <br>
    <label for="contrasena">Contraseña:</label>
    <input type="password" name="contrasena">
    <br>
    <input type="submit" value="Registrar">
</form>