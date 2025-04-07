

<?php
include("database.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <style> 
        body {
            background-color: #f5f5f5; 
            font-family: Arial, sans-serif; 
            margin: 0; 
            padding: 0; 
            margin-bottom: 100px;
        }

        h2 {
            background-color: #06263b; 
            color: white; 
            padding: 10px; 
            text-align: center; 
        }

        a {
            text-decoration: none; 
            color: #007bff; 
        }

        table {
            width: 50%; 
            border-collapse: collapse; 
            margin-bottom: 20px;
            margin-left: 20px;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd; 
            padding: 8px; 
            text-align: left; 
        }

        th {
            background-color: #4c837b; 
            color: white; 
        }

        tr:hover {
            background-color: #f0f0f0; 
        }

        button[type='submit'] {
            background-color: #dc3545;
            color: white;
            padding: 3px 10px;
            border: none;
            border-radius: 4px;
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
            padding:10px;
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 30px;
        }
    </style>
</head>

<body>
    <nav>
        <a href="index.php">| &nbsp;&nbsp;&nbsp;Add a Student&nbsp;&nbsp;&nbsp; |</a>
        <a href="display_data.php">| &nbsp;&nbsp;&nbsp;Go To Student List&nbsp;&nbsp;&nbsp; |</a>
    </nav>

    <h1>Student List</h1>
    <table border="1">
        <tr>
            <th>S.No</th>
            <th>Student Name</th>
            <th>Class</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Action</th>
        </tr>

        <?php
        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $result = mysqli_query($connection, "SELECT * FROM student");

        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                      <td>" . $i++ . "</td>
                      <td>{$row['StudentName']}</td>
                      <td>{$row['Class']}</td>
                      <td>{$row['Age']}</td>
                      <td>{$row['Gender']}</td>
                      <td>
                          <a href='edit.php?id={$row['ID']}'>Edit</a> | 
                          <form style='display: inline;' method='post' action='delete.php'>
                              <input type='hidden' name='ID' value='{$row['ID']}'>
                              <button type='submit'>Delete</button>
                          </form>
                      </td>
                  </tr>";
        }

        mysqli_close($connection);
        ?>
    </table>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Copyright.</p>
    </footer>
</body>

</html>
