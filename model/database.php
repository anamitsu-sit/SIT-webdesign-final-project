<?php
function createDatabaseConnection()
{
    $host = 'localhost';
    $data = 'YORDI';   
    $user = 'root';         
    $pass = 'Wiadro20';              
    $chrs = 'utf8mb4';
    $attr = "mysql:host=$host;dbname=$data;charset=$chrs";
    $opts =
    [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
      $conn = new PDO($attr, $user, $pass, $opts);
      return $conn;
  } catch (PDOException $e) {
      die("Connection failed: " . $e->getMessage());
  }
}
?>
