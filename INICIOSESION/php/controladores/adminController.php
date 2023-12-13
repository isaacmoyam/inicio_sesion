<?php
    require_once 'php/modelos/user.php';
    class AdminController {
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
            $this->obj = new User();
        }

        public function index() {
            session_start();
            $perfilPermitido = '0'; // Cambia esto según los permisos requeridos
            if ($_SESSION['perfil'] != $perfilPermitido) {
                // El usuario no tiene los permisos necesarios, redirigir o mostrar un mensaje de error
                header('Location: index.php');
                exit();
            }
            $this->pagina = "Administración";        
            $this->vista = 'admin';
        }

        public function instalacionVista() {
            $this->pagina = "Instalación";        
            $this->vista = 'instalacion';
        }

        public function register() {
            if(isset($_POST["correo"]) && isset($_POST["contrasena"]) && !empty($_POST["correo"]) && !empty($_POST["contrasena"])) {
                $correo = $_POST["correo"];
                $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);
                $nombre = "root";
                $perfil = "0";
                $this->obj->registrarUsuario($correo,$contrasena,$nombre,$perfil);
                header('Location: index.php');
            } else {
                echo "NO SE PUDO REGISTRAR AL ADMINISTRADOR PORQUE FALTAN DATOS";
            }
        }

        public function altaAdminVista() {
            session_start();
            $perfilPermitido = '0'; // Cambia esto según los permisos requeridos
            if ($_SESSION['perfil'] != $perfilPermitido) {
                // El usuario no tiene los permisos necesarios, redirigir o mostrar un mensaje de error
                header('Location: index.php');
                exit();
            }
            $this->pagina = "Alta de admins";        
            $this->vista = 'altaAdmin';
        }

        public function altaAdmin() {
            if(isset($_POST["correo"]) && isset($_POST["contrasena"]) && isset($_POST["perfil"]) && !empty($_POST["correo"]) && !empty($_POST["contrasena"]) && !empty($_POST["perfil"])) {
                $correo = $_POST["correo"];
                $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);
                $juego = $_POST["perfil"];
                switch($juego) {
                    case "1":
                        $perfil = "3";
                        $nombre = "adminjuego1";
                        break;
                    case "2":
                        $perfil = "4";
                        $nombre = "adminjuego2";
                        break;
                }
                $this->obj->registrarUsuario($correo,$contrasena,$nombre,$perfil);
                header('Location: index.php?metodo=index&control=adminController');
            } else {
                echo "NO SE PUDO REGISTRAR AL ADMIN PORQUE FALTAN DATOS";
            }
        }

        public function game1admin() {
            session_start();
            $perfilPermitido = '3'; // Cambia esto según los permisos requeridos
            if ($_SESSION['perfil'] != $perfilPermitido) {
                // El usuario no tiene los permisos necesarios, redirigir o mostrar un mensaje de error
                header('Location: index.php');
                exit();
            }
            $this->pagina = "Administración del juego 1";        
            $this->vista = 'juego1Admin';
        }

        public function game2admin() {
            session_start();
            $perfilPermitido = '4'; // Cambia esto según los permisos requeridos
            if ($_SESSION['perfil'] != $perfilPermitido) {
                // El usuario no tiene los permisos necesarios, redirigir o mostrar un mensaje de error
                header('Location: index.php');
                exit();
            }
            $this->pagina = "Administración del juego 2";        
            $this->vista = 'juego2Admin';
        }
    }
?>