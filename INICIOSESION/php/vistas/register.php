<!-- Formulario de registro -->
<h1>REGISTRO</h1>
<form action="?control=userController&metodo=register" method="post">
    <label for="correo">Correo:</label>
    <input type="text" name="correo">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre">
    <br>
    <label>Perfil:</label>
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