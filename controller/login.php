<?php

require __DIR__ . '/../src/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database = new \App\database();
    $database->login($_POST['username'], $_POST['password']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuel Receipt Form</title>
    <style>
        input[type="submit"] {
            width: 90%;
            padding: 5px;
            background-color: white;
            border: black;
            font-size: 20px;
        }
    </style>
</head>
<body>
<h1>Login</h1>
<form method="post">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username"><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br>
    <input value="submit" type="submit">
</form>
</body>
</html>

