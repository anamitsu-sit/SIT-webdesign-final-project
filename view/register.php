<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // Redirect to login page if not logged in
    header("Location: ../index.php?action=main");
    exit();
}
?>

<!-- TODO: Add back button -->
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
        <p class="text-5xl">sign up</p>

        <form class="user-form" action="../index.php?action=register" method="post">

            <input type="text" name="username" placeholder="Username">
            <input type="text" name="fullname" placeholder="Full Name">
            <input type="email" name="email" placeholder="Email"> 
            <input type="password" name="password" placeholder="Password">
            <div class="flex flex-col align-start mt-2">
            <label for="data_format">Choose Data Format:</label>
            <select id="data_format" name="data_format">
                <option value="d-m-Y">DD-MM-YYYY</option>
                <option value="m-d-Y">MM-DD-YYYY</option>
                <option value="Y-M-d">YYYY-MM-DD</option>
                <option value="F d">Month DD</option>
            </select>
            </div>

            <button class="button-secondary mt-2" type="submit" name="register">Sign Up</button>
        </form>     
        <!-- TODO: Print error prettier -->
        <span class="error"><?php echo isset($_GET['err']) ? $_GET['err'] : ''; ?></span>
    
    </div>
    </div>
</body>

</html>