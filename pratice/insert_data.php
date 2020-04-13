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
    $sql = "INSERT INTO user_details (city,sub_city,shop_name,lat,lng,description,contact_number) VALUES ('".$_POST["city"]."','".$_POST["sub_city"]."','".$_POST["shop_name"]."','".$_POST["lng"]."','".$_POST["lat"]."','".$_POST["description"]."','".$_POST["contact_number"]."')";

    if ($conn->query($sql) === TRUE) {
        header("location:admin_page.php");
        // echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>