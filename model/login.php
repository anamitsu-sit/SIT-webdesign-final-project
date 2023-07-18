<?php

require_once 'database.php';

function getUserByUsername($username, $conn)
{
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function loginUser($username, $password, $conn)
{
    $row = getUserByUsername($username, $conn);
    if (!$row) {
        return ['success' => false, 'message' => 'Invalid username!'];
    }

    $hashedPassword = $row['password'];
    if (!password_verify($password, $hashedPassword)) {
        return ['success' => false, 'message' => 'Invalid password!'];
    }

    return [
        'success' => true,
        'username' => $row['username'],
        'full_name' => $row['full_name'],
        'email' => $row['email'],
        'date_format' => $row['date_format'],
    ];
}
