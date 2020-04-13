<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pratice";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    // sql to delete a record
    $sql = "DELETE FROM user_details WHERE id='".$_POST["id"]."'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();

?>