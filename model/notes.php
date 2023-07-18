<?php
require_once 'database.php';

function getNotesForUser($username)
{
    $conn = createDatabaseConnection();

    $query = "SELECT title, date_created, ID FROM notes WHERE username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Sort notes by date in ascending order
    usort($notes, function ($a, $b) {
        $dateA = strtotime($a['date_created']);
        $dateB = strtotime($b['date_created']);
        return $dateA - $dateB;
    });

    return $notes;
}

function createNewNote($username, $title, $content)
{
    $conn = createDatabaseConnection();

    $query = "INSERT INTO notes (username, title, content) VALUES (:username, :title, :content)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);

    try {
        $stmt->execute();
        return true; // Note creation successful
    } catch (PDOException $e) {
        return false; // Note creation failed
    }
}

function getNote($noteID)
{
    $conn = createDatabaseConnection();

    $query = "SELECT content, title FROM notes WHERE ID = :noteID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':noteID', $noteID);
    $stmt->execute();

    $note = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($note) {
        return $note;
    } else {
        return null; // Note not found
    }
}

function deleteNoteByID($noteID)
{
    $conn = createDatabaseConnection();

    $query = "DELETE FROM notes WHERE ID = :noteID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':noteID', $noteID);

    try {
        $stmt->execute();
        return true; // Note deletion successful
    } catch (PDOException $e) {
        return false; // Note deletion failed
    }
}


?>
