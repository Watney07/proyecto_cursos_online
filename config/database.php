<?php

class Database {
    private $config;
    private $pdo = null;

    public function __construct(array $config = null) {
        // cargar config desde config/config.php si no se pasa por parámetro
        if ($config === null) {
            $cfg = require __DIR__ . '/config.php';
            $this->config = $cfg['db'];
        } else {
            $this->config = $config;
        }
    }

    public function connect(): ?PDO {
        if ($this->pdo !== null) {
            return $this->pdo;
        }

        $host = $this->config['host'] ?? '127.0.0.1';
        $port = $this->config['port'] ?? 3306;
        $db   = $this->config['database'] ?? 'cursos_online';
        $user = $this->config['username'] ?? 'root';
        $pass = $this->config['password'] ?? '';
        $charset = $this->config['charset'] ?? 'utf8mb4';

        $dsn = "mysql:host={$host};port={$port};dbname={$db};charset={$charset}";

        try {
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $this->pdo = new PDO($dsn, $user, $pass, $options);

            // Forzar engine to InnoDB for session (optional safety)
            $this->pdo->exec("SET SESSION wait_timeout=28800");
            return $this->pdo;
        } catch (PDOException $e) {
            // En desarrollo mostramos el error. En producción deberías registrarlo.
            if (defined('DEBUG') && DEBUG) {
                echo "Connection error: " . $e->getMessage();
            } else {
                error_log("DB connection error: " . $e->getMessage());
            }
            return null;
        }
    }
}
