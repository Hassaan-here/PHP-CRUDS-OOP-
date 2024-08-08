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
    public function getData($table, $field = '*', $conditionArr = '', $order_by_field = '', $order_by_type = 'desc', $limit = '')
    {
        $sql = "SELECT $field FROM $table ";

        // Conditions Check
        if (is_array($conditionArr) && !empty($conditionArr)) {
            $sql .= 'WHERE ';
            $c = count($conditionArr);
            $i = 1;

            foreach ($conditionArr as $key => $value) {
                // Ensure proper quoting for SQL queries
                $sql .= "$key= '$value' ";

                if ($i < $c) {
                    $sql .= ' AND ';
                }
                $i++;
            }
        }

        // Order BY Check
        if (!empty($order_by_field)) {
            $sql .= "ORDER by $order_by_field $order_by_type ";
        }
        // Limit Check
        if (!empty($limit)) {
            $sql .= " Limit $limit ";
        }
        die($sql);

        // $result = $this->DBConnection()->query($sql);

        // if (mysqli_num_rows($result) > 0) {

        //     while ($row = mysqli_fetch_assoc($result)) {
        //         return $row;
        //     }
        // }
    }

    public function insertData($table, $conditionArr = '')
    {
        $sql = "INSERT INTO $table (";
        $values = "VALUES (";

        // Fields and Values
        if (is_array($conditionArr) && !empty($conditionArr)) {
            $c = count($conditionArr);
            $i = 1;

            foreach ($conditionArr as $key => $value) {
                $sql .= $key;

                if (is_numeric($value)) {
                    $values .= "$value";
                } else {
                    $values .= "'$value'";
                }

                if ($i < $c) {
                    $sql .= ', ';
                    $values .= ', ';
                }
                $i++;
            }

            $sql .= ") " . $values . ")";
        }

        die($sql); // For debugging, to see the generated SQL query
    }

    public function deleteData($table, $conditionArr = '')
    {
        $sql = " DELETE FROM $table WHERE ";

        if (is_array($conditionArr) && !empty($conditionArr)) {
            $c = count($conditionArr);
            $i = 1;

            foreach ($conditionArr as $key => $value) {
                if (is_numeric($value)) {
                    $sql .= "$key = $value";
                } else {
                    $sql .= "$key = '$value'";
                }
                if ($i < $c) {
                    $sql .= " AND ";
                }
                $i++;
            }
        }
        die($sql);
    }
}



$obj = new query();
$conditionArr = array('id' => 1, 'Name' => 'John Doe');
$result = $obj->getData('students', '*', $conditionArr, 'name', 'asc', 7);
// $result = $obj->insertData('students', $conditionArr);
// $result = $obj->deleteData('students', $conditionArr);
print_r($result);
