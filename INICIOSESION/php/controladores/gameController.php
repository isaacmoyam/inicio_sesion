<?php
    class GameController {
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
        
        public function game1() {
            session_start();
            $perfilPermitido = '1'; // Cambia esto según los permisos requeridos
            if ($_SESSION['perfil'] != $perfilPermitido) {
                // El usuario no tiene los permisos necesarios, redirigir o mostrar un mensaje de error
                header('Location: index.php');
                exit();
            }
            $this->pagina = "Juego 1";        
            $this->vista = 'juego1';
        }

        public function game2() {
            session_start();
            $perfilPermitido = '2'; 
            // Cambia esto según los permisos requeridos
            if ($_SESSION['perfil'] != $perfilPermitido) {
                // El usuario no tiene los permisos necesarios, redirigir o mostrar un mensaje de error
                header('Location: index.php');
                exit();
            }
            $this->pagina = "Juego 2";        
            $this->vista = 'juego2';
        }
    }
?>