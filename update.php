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
<body>
<nav>
<a href="index.php">| &nbsp &nbsp &nbspAdd a Student &nbsp &nbsp &nbsp  |   </a>
        <a href="display_data.php">| &nbsp &nbsp &nbsp Go To Student List &nbsp &nbsp &nbsp   |  </a>
        <br>
        
    </nav>
</body>
</html>
<?php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ID'])) {
    $ID = $_POST['ID'];
    $Studentname = $_POST['Studentname'];
    $Class = $_POST['Class'];
    $Age = $_POST['Age'];
    $Gender = $_POST['Gender'];

    // Perform the update
    $result = mysqli_query($connection, "UPDATE student SET StudentName = '$Studentname', Class = '$Class', Age = '$Age', Gender = '$Gender' WHERE ID = $ID");

    if ($result) {
        echo "Record updated successfully.";
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    mysqli_close($connection);
} else {
    echo "Invalid request.";
}
?>
