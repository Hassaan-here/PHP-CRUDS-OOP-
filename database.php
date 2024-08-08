<?php
class Database
{
    private $host;
    private $UserName;
    private $dbPassword;
    private $dbName;

    protected function DBConnection()
    {
        $this->host = "localhost";
        $this->UserName = "root";
        $this->dbPassword = "";
        $this->dbName = "cruds";

        $conn = new mysqli($this->host, $this->UserName, $this->dbPassword, $this->dbName);

        return $conn;
    }
}

class query extends Database
{
    public function getData()
    {
        $sql = "SELECT * FROM users";
        $result = $this->DBConnection()->query($sql);

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                return $row;
            }
        }
    }
}
