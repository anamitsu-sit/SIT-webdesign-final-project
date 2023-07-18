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

if (isset($_POST['login'])) {
    $username = filter_input(INPUT_POST, 'username');
    $password = $_POST['password'];

    // Validate login credentials
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    
    if ($stmt->rowCount() === 0) {
        $err = 'Invalid username!';
        header("Location: login.php?err=$err");
        exit();
    }
    
    // echo $stmt->rowCount();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $username = $row['username'];
    $full_name = $row['full_name'];
    $email = $row['email'];
    $hashedPassword = $row['password'];
    $date_format = $row['date_format'];

    if (!password_verify($password, $hashedPassword)) {
        $err = 'Invalid password!';
        header("Location: login.php?err=$err");
        exit();
    } 
    $username = $row['username'];
    $full_name = $row['full_name'];
    $email = $row['email'];
    $hashedPassword = $row['password'];
    $date_format = $row['date_format'];

    $_SESSION['username'] = $username;
    $_SESSION['full_name'] = $full_name;
    $_SESSION['email'] = $email;
    $_SESSION['date_format'] = $date_format;
    $_SESSION['logged_in'] = true;

    echo $username . $full_name . $email . $date_format . $_SESSION['logged_in'];

    //header("Location: main.php"); 
}

?>
