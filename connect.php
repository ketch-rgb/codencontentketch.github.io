<?php

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];

    //database connection
    $conn = new mysqli('localhost', 'root', 'hitler@12', 'contact_form');
    if($conn->connect_error){
        die('Connection failed :' .$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into website_contact_form(firstName, lastName, email, number, message) values(?,?,?,?,?)");
        $stmt->bind_param("sssis", $firstName, $lastName, $email, $number, $message);
        $stmt->execute();
        echo "Form Submitted Succesfully";
        $stmt->close();
        $conn->close();
    }


?>