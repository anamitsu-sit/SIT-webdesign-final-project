<!-- TODO: Add back button -->
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

<body>
    <nav class="flex justify-end px-20 py-5 items-center">
        <div class="flex items-center">
            <ul class="flex items-center space-x-6">
            <li class="font-semibold"><a href="welcome.php">home</a></li>
            <li class="font-semibold"><a href="login.php">login</a></li>
            <li class="font-semibold"><a href="register.php">sign up</a></li>
            </ul>
        </div>
    </nav>
    <div class="text-xl w-full flex justify-center items-center">
    <div class="main-banner-form">
        <p class="text-5xl">Log In</p>
        <form class="user-form" action="../index.php?action=login" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button class="button-secondary mt-8" type="submit" name="login">Log In</button>
        </form>
        <!-- TODO: Print error prettier! -->
        <span class="error"><?php echo isset($_GET['err']) ? $_GET['err'] : ''; ?></span>
    </div>
    </div>
</body>

</html>