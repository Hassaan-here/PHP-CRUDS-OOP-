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
        $sql = "SELECT $field FROM $table";

        // Conditions Check
        if (is_array($conditionArr) && !empty($conditionArr)) {
            $whereClauses = [];

            foreach ($conditionArr as $key => $value) {
                if (is_numeric($value)) {
                    $whereClauses[] = "$key = $value";
                } else {
                    $whereClauses[] = "$key = '$value'";
                }
            }
            if (!empty($whereClauses)) {
                $sql .= " WHERE " . implode(" AND ", $whereClauses);
            }
        }

        // Order BY Check
        if (!empty($order_by_field)) {
            $sql .= " ORDER by $order_by_field $order_by_type ";
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

    public function insertData($table, $conditionArr = [])
    {
        $sql = "INSERT INTO $table (";

        if (is_array($conditionArr) && !empty($conditionArr)) {
            $fields = [];
            $values = [];

            foreach ($conditionArr as $key => $value) {
                $fields[] = $key;

                if (is_numeric($value)) {
                    $values[] = $value;
                } else {
                    $values[] = "'$value'";
                }
            }

            $sql .= implode(', ', $fields) . ") VALUES (" . implode(', ', $values) . ")";
        }

        die($sql);
    }


    public function deleteData($table, $conditionArr = [])
    {
        $sql = "DELETE FROM $table";

        if (is_array($conditionArr) && !empty($conditionArr)) {
            $whereClauses = [];

            foreach ($conditionArr as $key => $value) {
                if (is_numeric($value)) {
                    $whereClauses[] = "$key = $value";
                } else {
                    $whereClauses[] = "$key = '$value'";
                }
            }
            $sql .= " WHERE " . implode(" AND ", $whereClauses);
        }

        die($sql);
    }

    public function updateData($table, $conditionArr = '', $fields = '')
    {
        $sql = "UPDATE $table SET ";
        if (is_array($conditionArr) && is_array($fields) && !empty($conditionArr) && !empty($fields)) {
            $setClauses = [];
            $whereClauses = [];

            // Building the SET clause
            foreach ($conditionArr as $key => $value) {
                if (is_numeric($value)) {
                    $setClauses[] = "$key = $value";
                } else {
                    $setClauses[] = "$key = '$value'";
                }
            }
            $sql .= implode(" , ", $setClauses);

            // Building the WHERE clause
            foreach ($fields as $key => $value) {
                if (is_numeric($value)) {
                    $whereClauses[] = "$key = $value";
                } else {
                    $whereClauses[] = "$key = '$value'";
                }
            }
            $sql .= " WHERE " . implode(" AND ", $whereClauses);
        }

        die($sql);
    }
}



$obj = new query();
$conditionArr = array('Name' => 'John Doeee');
$fields = array('id' => 1, 'Name' => 'John Doe');
// $result = $obj->getData('students', 'name,age', $conditionArr, 'name', 'asc', 7);
// $result = $obj->insertData('students', $conditionArr);
// $result = $obj->deleteData('students', $conditionArr);
$result = $obj->updateData('students', $conditionArr, $fields);
print_r($result);
