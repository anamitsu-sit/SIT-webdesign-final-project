<!-- view/main.php -->
<?php
require_once '../model/database.php';

session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Create a new PDO connection
try {
    $conn = new PDO($attr, $user, $pass, $opts); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Sample data for user 'Norbert'
$user = $_SESSION['username'];

// Retrieve notes for user 'Norbert'
$query = "SELECT title, date_created FROM notes WHERE username = :username";
$stmt = $conn->prepare($query);
$stmt->bindParam(':username', $user);
$stmt->execute();

// Fetch notes
$notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Sort notes by date in ascending order
usort($notes, function ($a, $b) {
    $dateA = strtotime($a['date_created']);
    $dateB = strtotime($b['date_created']);
    return $dateA - $dateB;
});

?>

<!-- TODO: Add logout button -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nanum+Myeongjo">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/final/css/main.css">
    <title>Diary App</title>
</head>

<body class="text-xl">
    <div class="main-banner h-screen w-screen flex flex-col justify-center items-center">
        <p class="text-5xl">Welcome <?php echo $_SESSION['full_name']; ?></p>

        <div class="entries my-10 mx-8 flex flex-wrap justify-around gap-4">
            <?php foreach ($notes as $note) : ?>
                <?php
                $title = $note['title'];
                // Get the desired date format from the session
                $date_format = $_SESSION['date_format'];
                $date_timestamp = $note['date_created'];

                // Format the date based on the session's date format
                $note_date = date($date_format, strtotime($date_timestamp));
                // $date_created = date_format(date_create_from_format('Y-m-d H:i:s', $note['date_created']), $date_format);
                // $date_created = date('F j', strtotime($note['date_created']));
                ?>
                <div class="button"><?php echo $note_date; ?></div>
            <?php endforeach; ?>
        </div>

        <a class="button-secondary" href="new-entry.html">Create New Entry</a>
    </div>
</body>

</html>
