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
    <form class="user-form">
        <input type="text" id="entry-text" name="new-text" placeholder="Tell how was your day today...">
        <div class="flex flex-col items-center mt-8 gap-4 w-9/12 sm:flex-row sm:justify-around">
            <a href="main.php" class="button" type="cancel" class="mt-10">cancel</a>
            <button class="button-secondary" type="submit" class="mt-10">create new entry</button>
        </div>
    </form>
    </div>
</body>

</html>