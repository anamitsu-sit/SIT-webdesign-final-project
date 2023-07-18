<?php

session_start();
require_once 'database.php';

try
{
  $conn = new PDO($attr, $user, $pass, $opts);
}
catch (\PDOException $e)
{
  throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if (isset($_POST['register'])) {
    $username_err = '';
    $email_err = '';

    $username = $_POST['username'];
    $fullname = filter_input(INPUT_POST, 'fullname');
    $email = filter_input(INPUT_POST, 'email');
    $password = $_POST['password'];
    $date_format = 'date_format';

    if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
        $err = 'Invalid username!';
        header("Location: register.php?err=$err");
        exit();
    }
    // Sanitize fullname
    $fullname = filter_var($fullname, FILTER_SANITIZE_SPECIAL_CHARS);
    // Validate email 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err = 'Invalid email!';
        header("Location: register.php?err=$err");
        exit();
    }  

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into the database
    $query = "INSERT INTO users (username, password, full_name, email, date_format) VALUES (:username, :hashedPassword, :full_name, :email, :date_format)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':hashedPassword', $hashedPassword);
    $stmt->bindParam(':full_name', $full_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':date_format', $date_format);
    
    if ($stmt->execute()) {
        // TODO: Direct to page that will have just text that registration was successful 
        // and there is button to redirect user to index.html
        header("Location: index.html");
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}

?>
