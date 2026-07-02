<?php
class Database
{

    private static $host = "localhost";
    private static $dbname = "tp_boutique";
    private static $user = "root";
    private static $password = "";

    private static ?PDO $instance = null;

    public static function getConnexion() :PDO
    {

        if (self::$instance == null) {
            try {
                self::$instance = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8mb4", self::$user, self::$password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]);
            } catch (PDOException $e) {
                die("Erreur critique de connexion : " . $e->getMessage());
            }
        }

        return self::$instance;
    }
}
