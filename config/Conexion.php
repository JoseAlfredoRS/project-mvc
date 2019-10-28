<?php

require_once dirname(dirname(__FILE__)) . "/config/app.php";

class Conexion
{
    protected $host = DB_HOST;
    protected $base = DB_NAME;
    protected $user = DB_USER;
    protected $pass = DB_PASS;

    protected $dsn;
    protected $dbh;
    protected $stmt;

    public function __construct()
    {
        try {
            $this->dsn = "mysql:host=" . $this->host . ";dbname=" . $this->base . "; charset=utf8";
            $this->dbh = new PDO($this->dsn, $this->user, $this->pass);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        } catch (PDOException $e) {
            die("ERROR: " . $e->getMessage());
        }
    }

    public function query($sql, $param = [])
    {
        try {
            $sql = trim($sql);
            $type = strtoupper(substr($sql, 0, 6));
            $this->stmt = $this->dbh->prepare($sql);
            if (count($param) > 0) {
                for ($i = 0; $i < count($param); $i++) {
                    $this->stmt->bindParam($i + 1, $param[$i]);
                }
            }
            switch ($type) {
                case 'SELECT':
                    $this->stmt->execute();
                    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                    break;
                default:
                    return $this->stmt->execute();
                    break;
            }
        } catch (PDOException $e) {
            die("ERROR: " . $e->getMessage());
        }
    }

    public function __destruct()
    {
        $this->dbh = null;
        $this->stmt = null;
    }
}
