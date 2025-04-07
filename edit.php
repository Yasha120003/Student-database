
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin-bottom: 300;
            padding: 0;
            height: 100vh;
        }

        form {
            background-color: #06263b;
            color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width:300px;
            height : 400px;
            box-sizing: border-box;
        }

        input[type="text"], input[type="radio"], input[type="submit"] {
            margin-bottom: 15px;
        }

        input[type="text"], input[type="radio"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4c837b;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: black;
        }
        footer {
    background-color: #06263b;
    color: white;
    text-align: center;
    padding: 10px;
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 30px;
    
   
}


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
<a href="index.php">| &nbsp &nbsp &nbspAdd a Student   &nbsp &nbsp &nbsp  |   </a>
        <a href="display_data.php">| &nbsp &nbsp &nbspGo To Student List &nbsp &nbsp &nbsp   |  </a>
        <br>
        
    </nav>

<?php

include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the data for the specified ID from the database
    $result = mysqli_query($connection, "SELECT * FROM student WHERE id = $id");

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if (!$row) {
            echo "Record not found.";
        } else {
            // Display a form with the existing data for editing
            echo "<form action='update.php' method='post'>
                      <input type='hidden' name='ID' value='{$row['ID']}'>
                      Student Name:<br> <input type='text' name='Studentname' value='{$row['StudentName']}'><br>
                      Class:<br> <input type='text' name='Class' value='{$row['Class']}'><br>
                      Age: <br><input type='text' name='Age' value='{$row['Age']}'><br>
                      Gender: <br>
                      male<input type='radio' name='Gender' value='male' " . ($row['Gender'] == 'male' ? 'checked' : '') . "> 
                      female<input type='radio' name='Gender' value='female' " . ($row['Gender'] == 'female' ? 'checked' : '') . "><br>
                      <input type='submit' value='Update'>
                  </form>";
        }
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    mysqli_close($connection);
} else {
    echo "Invalid request.";
}
?>
<footer>
        <p>&copy; <?php echo date("Y"); ?> Copyright.</p>
    </footer>

</body>
</html>
