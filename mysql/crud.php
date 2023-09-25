<?php
require "config.php";
/**
 * Class crud 
 */
class Crud
{

    /**
     * Reading form MySql
     *
     * @param [type] $query
     * @return void
     */
    public function read($query)
    {
        global $connect;
        $sqlRead = $query;
        $result = mysqli_query($connect, $sqlRead);
        if (!$result) {
            die("Query failed: " . mysqli_error($connect));
        }
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        print_r($row);
        echo "<br>";
    }
    #code here
}

// excute
$sqlReading = "select * from news";
$test = new Crud;
var_dump($test->read($sqlReading));
