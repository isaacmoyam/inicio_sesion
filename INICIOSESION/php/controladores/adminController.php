<?php
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
    }
?>