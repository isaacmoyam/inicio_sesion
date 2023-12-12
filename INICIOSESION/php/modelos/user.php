<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once 'php/modelos/db.php';

    class User {

        private $conexion;

        // Constructor
        public function __construct() {
            $dbObj = new Db();
            $this->conexion = $dbObj->mysqli;
        }

        public function registrarUsuario($correo, $pw, $nombre, $perfil) {
            // Use prepared statements to avoid SQL injection
            $sql = "INSERT INTO us_admin (correoUsuario, passwordHash, nombre, perfil) VALUES (?, SHA2(?, 256), ?, ?)";
            
            // Prepare the statement
            $stmt = $this->conexion->prepare($sql);
        
            // Bind parameters
            $stmt->bind_param("sssi", $correo, $pw, $nombre, $perfil);
        
            // Execute the statement
            $stmt->execute();
        
            // Close the statement
            $stmt->close();
        
            // Close the connection
            $this->conexion->close();
        }

        public function iniciarSesion($correo, $pw) {
            // Use prepared statements to avoid SQL injection
            $sql = "SELECT idUsuario, nombre, perfil, passwordHash FROM us_admin WHERE correoUsuario = ?";
        
            // Prepare the statement
            $stmt = $this->conexion->prepare($sql);
        
            // Bind parameters
            $stmt->bind_param("s", $correo);
        
            // Execute the statement
            $stmt->execute();
        
            // Bind result variables
            $stmt->bind_result($idUsuario, $nombre, $perfil, $passwordHash);
        
            // Fetch the result
            $stmt->fetch();

            // Close the statement
            $stmt->close();

            // Close the connection
            $this->conexion->close();

            // Verificar si se encontró un usuario con las credenciales proporcionadas
            if ($idUsuario && hash('sha256', $pw) === $passwordHash) {
                // Iniciar sesión aquí (por ejemplo, establecer variables de sesión)
                session_start();
                $_SESSION['idUsuario'] = $idUsuario;
                $_SESSION['nombre'] = $nombre;
                $_SESSION['perfil'] = $perfil;

                // Puedes redirigir al usuario a otra página después de iniciar sesión si es necesario
                switch($_SESSION['perfil']) {
                    case "1": 
                        header('Location: index.php?metodo=game1&control=gameController');
                        exit();
                        break;
                    case "2":
                        header('Location: index.php?metodo=game2&control=gameController');
                        exit();
                        break;
                    case "0":
                        header('Location: index.php?metodo=index&control=adminController');
                        exit();
                }
            } else {
                echo "USUARIO INCORRECTO O CONTRASEÑA MAL INTRODUCIDA";
            }
        }
    }
?>