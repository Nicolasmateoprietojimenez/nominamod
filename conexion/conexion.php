<?php
class conexion
{
    public $host = 'localhost';
    public $username = 'root';
    public $password = '';
    public $dbName = 'nominamod';

    public function connect()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->dbName";
        $pdo = new PDO($dsn, $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}
?>
