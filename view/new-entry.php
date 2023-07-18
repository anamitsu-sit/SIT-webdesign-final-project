<?php
// require_once '../model/notes.php';
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect to login page if not logged in
    header("Location: ../index.php?action=login");
    exit();
}

$user = $_SESSION['username'];
?>

<!-- TODO: Actually add note to db -->
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

<body class="text-xl w-full h-screen flex flex-col justify-center items-center">
    <p class="text-5xl">new entry</p>
    <form class="user-form" method="POST" action="../index.php?action=new_entry">
        <input type="text" id="entry-title" name="new-title" placeholder="Title">
        <input type="text" id="entry-text" name="new-content" placeholder="Tell how was your day today...">
        <div class="flex flex-col items-center mt-8 gap-4 w-9/12 sm:flex-row sm:justify-around">
            <a href="../index.php?action=main" class="button" type="cancel" class="mt-10">cancel</a>
            <button class="button-secondary" type="submit" class="mt-10">create new entry</button>
        </div>
</form>



        
        <!-- <input type="text" id="entry-content" name="new-content" placeholder="Tell how was your day today...">
        <div class="flex flex-col items-center mt-8 gap-4 w-9/12 sm:flex-row sm:justify-around">
            <a href="../index.php?action=main" class="button" type="cancel" class="mt-10">Cancel</a>
            <button class="button-secondary" type="submit" class="mt-10">Create New Entry</button>
        </div>
    </form> -->


    </div>
</body>

</html>