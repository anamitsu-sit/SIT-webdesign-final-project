<!-- view/main.php -->
<?php
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}
?>

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
            <div class="button">June 1</div>
            <div class="button">June 2</div>
            <div class="button">June 3</div>
            <div class="button">June 4</div>
            <div class="button">June 5</div>
        </div>

        <a class="button-secondary" href="new-entry.html">Create New Entry</a>
    </div>
</body>

</html>
