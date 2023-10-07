<?php
require ('helper_function.php');
// Tao moi Sinh vien

/**
 * @param $fullname
 * @param $birthday
 * @param $code
 * @return true
 * Nhan tu tt tu client -> db
 */
function create($id, $fullname, $birthday, $code)
{
    global $connect;
    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO students (id, fullname, birthday, code) VALUES (?, ?, ?, ?)";
    // Prepare the SQL statement
    $stmt = $connect->prepare($sql);

    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param("isss", $id, $fullname, $birthday, $code);

        // Execute the statement
        $result = $stmt->execute();

        // Check if the query was successful
        if ($result) {
            return true;
        } else {
            // Handle the error if the query fails
            return false;
        }
        // Close the statement
        $stmt->close();
    } else {
        // Handle the error if the statement preparation fails
        return false;
    }
}


#code Update , Delete
