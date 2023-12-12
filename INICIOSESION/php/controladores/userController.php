<?php
    require_once 'php/modelos/user.php';

    class UserController {

        /**
         * Vista actual que se mostrará en la página.
         * @var string
         */
        public $vista;
        /**
         * Título de la página.
         * @var string
         */
        public $pagina;

        public $obj;

        public function __construct() {
            $this->pagina = "Menú";        
            $this->vista = 'menu';
            $this->obj = new User();
        }

        public function registerVista() {
            $this->pagina = "Registro";        
            $this->vista = 'register';
        }

        public function loginVista() {
            $this->pagina = "Iniciar sesión";        
            $this->vista = 'login';
        }

        public function register() {
            if(isset($_POST["correo"]) && isset($_POST["contrasena"]) && isset($_POST["nombre"]) && isset($_POST["perfil"]) && !empty($_POST["correo"]) && !empty($_POST["contrasena"]) && !empty($_POST["nombre"]) && !empty($_POST["perfil"])) {
                $correo = $_POST["correo"];
                $contrasena = $_POST["contrasena"];
                $nombre = $_POST["nombre"];
                $perfil = $_POST["perfil"];
                $this->obj->registrarUsuario($correo,$contrasena,$nombre,$perfil);
            } else {
                echo "NO SE PUDO REGISTRAR AL USUARIO PORQUE FALTAN DATOS";
            }
        }

        public function login() {
            if(isset($_POST["correo"]) && isset($_POST["contrasena"]) && !empty($_POST["correo"]) && !empty($_POST["contrasena"])) {
                $correo = $_POST["correo"];
                $contrasena = $_POST["contrasena"];
                $this->obj->iniciarSesion($correo, $contrasena);
            } else {
                echo "NO SE PUDO INICIAR SESION DEBIDO A QUE FALTAN DATOS";
            }
        }
    }
?>