
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updated data</title>
    <style>
        nav {
    background-color: #06263b;
    overflow: hidden;
    margin-bottom: 20px;
    width: 100%;
    display: flex; 
    align-items: center;
    justify-content: center;
}

        nav a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
            
        }
        </style>
</head>

<nav>
<a href="index.php">| &nbsp &nbsp &nbspAdd a Student   &nbsp &nbsp &nbsp  |   </a>
        <a href="display_data.php">| &nbsp &nbsp &nbspGo To Student List &nbsp &nbsp &nbsp   |  </a>
        <br>
        
    </nav>
</html>
<?php
session_start();

include("database.php");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['ID'])) {
    $ID = mysqli_real_escape_string($connection, $_POST['ID']);

    $query = "DELETE FROM student WHERE ID = $ID";

    if (mysqli_query($connection, $query)) {
        echo "RECORD WITH ID : $ID DELETED SUCCESSFULLY.<br>"; 
    
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
} else {
    echo "Invalid request. Please provide an 'ID' parameter.";
}

mysqli_close($connection);
?>