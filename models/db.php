<?php
class Database {
    private static $host = "localhost";
    private static $db = "cursos_online";
    private static $user = "root";
    private static $pass = "";
    private static $conn;

    public static function getConexion() {
        if (!self::$conn) {
            try {
                self::$conn = new PDO(
                    "mysql:host=".self::$host.";dbname=".self::$db,
                    self::$user,
                    self::$pass
                );
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}
