<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // Redirect to login page if not logged in
    header("Location: ../index.php?action=main");
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
    <link rel="stylesheet" href="../css/main.css">
    <title>Diary App</title>
</head>

<body class="text-xl">
    <nav class="flex justify-end px-20 py-5 items-center">
        <div class="flex items-center">
        <ul class="flex items-center space-x-6">
            <li class="font-semibold"><a href="welcome.php">home</a></li>
            <li class="font-semibold"><a href="login.php">login</a></li>
            <li class="font-semibold"><a href="register.php">sign up</a></li>
            </ul>
        </div>
    </nav>
    <div class="main-banner h-screen w-screen flex flex-col justify-center items-center">
        <p class="text-5xl">welcome</p>
        <p>to your journaling application</p>
        <div
            class="main-banner-buttons flex flex-col justify-center items-center w-full max-w-screen-sm mt-6 mb-6 gap-y-4 sm:flex-row sm:text-l sm:justify-around">
            <a class="button" href="../index.php?action=login">login</a>
            <a class="button" href="../index.php?action=register">sign up</a>
        </div>
    </div>
</body>

</html>