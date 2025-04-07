<?php
include("database.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Studentname = $_POST['Studentname'];
    $Class = $_POST['Class'];
    $Age = $_POST['Age'];
    $Gender = $_POST['Gender'];


    //  if the connection is successful
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO student (StudentName, Class, Age, Gender) VALUES ('$Studentname', '$Class', '$Age','$Gender')";

    if (mysqli_query($connection, $sql)) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    $_SESSION['submitted_data'] = [
      'Studentname' => $Studentname,
      'Class' => $Class,
      'Age' => $Age,
      'Gender' => $Gender
  ];

  header("Location: display_data.php"); // move to the display page
  exit();

    mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin-bottom: 300;
            padding: 0;
            height: 100vh;
            margin-bottom: 30px;
        }

        form {
            background-color: #06263b;
            color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width:300px;
            height : 450px;
            box-sizing: border-box;
            margin-bottom: 500px;
        }

        input[type="text"], input[type="radio"], input[type="submit"] {
            margin-bottom: 10px;
        }

        input[type="text"], input[type="radio"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: greenyellow; 
            color: #06263b; 
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        select {
          width: 100%;
          padding: 8px;
          box-sizing: border-box;
          margin-bottom: 10px; /* Adjust the value to set the desired space */
        }

        input[type="submit"]:hover {
            background-color: green; 
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
        footer {
    background-color: #06263b;
    color: white;
    text-align: center;
    padding: 10px;
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 30;
}

    </style>
</head>

<body>
<nav>
<a href="index.php">| &nbsp &nbsp &nbspAdd a Student   &nbsp &nbsp &nbsp  |   </a>
        <a href="display_data.php">| &nbsp &nbsp &nbspGo To Student List &nbsp &nbsp &nbsp   |  </a>
        <br>
        
    </nav>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <h2>Add Details</h2>
        Studentname:<br>
        <input type="text" name="Studentname"><br>
        Class:<br>
        <select id="Class" name="Class">
          <option>
          Select your class
          </option>
          <option>
            1

          </option>
          <option>
            2
          </option>
          <option>
            3
          </option>
          <option>
            4
          </option>
          <option>
            5
          </option>
          <option>
            6
          </option>
          <option>
            7
          </option>
            8
          <option>
            9
          </option>
          <option>
            10
          </option>
          <option>
            11
          </option>
          <option>
            12
          </option>
        </select><br>
        Age:<br>
        <input type="text" name="Age"><br>
        Gender:<br>
        <td>
        male<input type="radio" name="Gender" value="male" required><br>
        
        
        female<input type="radio" name="Gender" value="female" required><br>
         
      </td>

        <input type="submit" name="submit" value="register">
    </form>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Copyright.</p>
    </footer>
</body>

</html>



