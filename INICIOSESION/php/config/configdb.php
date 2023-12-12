<?php
    /**
     * Archivo de configuración
     *
     * PHP version 8.2
     *
     * @category Configuración
     * @package  ConexionBD
     * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
     */

    /**
     * Configuración de datos de conexión y opciones por defecto.
     */

    /**
     * Dirección del host de la base de datos.
     */
    define("HOST", 'localhost');

    /**
     * Nombre de la base de datos.
     */
    define("BDNAME", 'inicioSesion');

    /**
     * Nombre de usuario para la conexión a la base de datos.
     */
    define("USERNAME", 'root');

    /**
     * Contraseña para la conexión a la base de datos.
     */
    define("PASSWD", '');

    /**
     * Controlador por defecto.
     */
    define("CONTROLADOR_DEFAULT", "userController");

    /**
     * Método por defecto.
     */
    define("METODO_DEFAULT", "");
?>