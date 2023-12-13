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
            // CONSULTAS PREPARADAS PARA MAYOR SEGURIDAD
            $sql = "INSERT INTO us_admin (correoUsuario, passwordHash, nombre, perfil) VALUES (?, ?, ?, ?)";
            
            // PREPARAR LA CONSULTA
            $stmt = $this->conexion->prepare($sql);
        
            // ASIGNAR PARAMETROS
            $stmt->bind_param("sssi", $correo, $pw, $nombre, $perfil);
        
            // EJECUTAR SENTENCIA
            $stmt->execute();
        
            // CERRAR SENTENCIA
            $stmt->close();
        
            // CERRAR CONEXION
            $this->conexion->close();
        }

        public function iniciarSesion($correo, $pw) {
            // CONSULTA PREPARADA PARA EVITAR INYECCION SQL
            $sql = "SELECT idUsuario, nombre, perfil, passwordHash FROM us_admin WHERE correoUsuario = ?";
        
            // PREPARAR SENTENCIA
            $stmt = $this->conexion->prepare($sql);
        
            // ASIGNAR PARAMETROS
            $stmt->bind_param("s", $correo);
        
            // EJECUTAR
            $stmt->execute();
        
            // RECUPERAR RESULTADO
            $stmt->bind_result($idUsuario, $nombre, $perfil, $passwordHash);
        
            // LEER RESULTADO
            $stmt->fetch();

            // CERRAR SENTENCIA
            $stmt->close();

            // CERRAR CONEXION
            $this->conexion->close();

            // Verificar si se encontró un usuario con las credenciales proporcionadas
            if ($idUsuario && password_verify($pw, $passwordHash)) {
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
                        break;
                    case "3": 
                        header('Location: index.php?metodo=game1admin&control=adminController');
                        exit();
                        break;
                    case "4":
                        header('Location: index.php?metodo=game2admin&control=adminController');
                        exit();
                        break;
                }
            } else {
                echo "USUARIO INCORRECTO O CONTRASEÑA MAL INTRODUCIDA";
            }
        }
    }
?>