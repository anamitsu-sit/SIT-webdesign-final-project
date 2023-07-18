<?php
// model/register.php

require_once 'database.php';

function isUsernameValid($username)
{
    return preg_match('/^[a-zA-Z0-9]+$/', $username);
}

function isEmailValid($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isUsernameTaken($username, $conn)
{
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    return $stmt->rowCount() > 0;
}

function registerUser($username, $password, $fullname, $email, $date_format, $conn)
{
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, password, full_name, email, date_format) VALUES (:username, :hashedPassword, :full_name, :email, :date_format)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':hashedPassword', $hashedPassword);
    $stmt->bindParam(':full_name', $fullname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':date_format', $date_format);

    return $stmt->execute();
}
