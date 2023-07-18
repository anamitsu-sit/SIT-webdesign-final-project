<!-- view/main.php -->
<?php
require_once '../model/notes.php';
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect to login page if not logged in
    header("Location: ../index.php?action=login");
    exit();
}

$user = $_SESSION['username'];

// Retrieve notes for user 
$notes = getNotesForUser($user);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nanum+Myeongjo">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css">
    <title>Diary App</title>
</head>

<body class="text-xl">
    <div class="main-banner h-screen w-screen flex flex-col justify-center items-center">
        <p class="text-5xl">Welcome <?php echo $_SESSION['full_name']; ?></p>

        <div class="entries my-10 mx-8 flex flex-wrap justify-around gap-4">
            <?php foreach ($notes as $note) : ?>
                <?php
                // Get the desired date format from the session
                $date_format = $_SESSION['date_format'];
                $date_timestamp = $note['date_created'];

                // Format the date based on the session's date format
                $note_date = date($date_format, strtotime($date_timestamp));
                ?>
                <div class="button"><?php echo $note_date; ?></div>
            <?php endforeach; ?>
        </div>

        <a class="button-secondary" href="new-entry.html">Create New Entry</a>

        <!-- TODO: Make logout button prettier -->
        <a class="button-secondary" href="../index.php?action=logout">Logout</a>
    </div>
</body>

</html>
