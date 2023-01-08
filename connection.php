<?php 
    $servername = "localhost";
    $username = "id20115517_jcsadmin";
    $password = "Jcs@12345678";

    //error_reporting(~E_WARNING);
    //mysqli_report(MYSQLI_REPORT_STRICT);

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    //Check connection
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {
   //     echo "Connection successful!";
    }

    

    $dbname = "id20115517_jcs";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    //Check connection
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {
   //     echo "Connection successful!";
    }
