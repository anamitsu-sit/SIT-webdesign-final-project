<?php
require_once '../model/notes.php';
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect to login page if not logged in
    header("Location: ../index.php?action=login");
    exit();
}

$user = $_SESSION['username'];
$noteID = $_SESSION['selected_note_id'];
unset($_SESSION['selected_note_id']);

$note = getNote($noteID);

$userNote = $note['user'];
if($userNote !== $user){
    // User trying to access someones else note.
    header("Location: ../index.php?action=main");
    exit();
}

if ($note) {
    $noteContent = $note['content'];
    $noteTitle = $note['title'];
} else {
    header("Location: ../index.php?action=main");
    exit();
}

$isEditing = isset($_SESSION['edit']) && $_SESSION['edit'] === 'true';
unset($_SESSION['edit']);

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

<body class="text-xl w-full h-screen flex flex-col justify-center items-center">
    
    <?php if ($isEditing) : ?>
        <form class="user-form" method="POST" action="../index.php?action=edit_entry&note_id=<?php echo $noteID; ?>">
            <input type="text" id="entry-title" name="new-title" placeholder="Title" value="<?php echo $noteTitle; ?>">
            <textarea id="entry-text" name="new-content" placeholder="Tell how was your day today..."><?php echo $noteContent; ?></textarea>
            <div class="flex items-center mt-8 gap-4">
                <button class="button" type="submit">Save</button>
                <a href="../index.php?action=edit_entry&note_id=<?php echo $noteID; ?>" class="button-secondary">Back</a>
            </div>
        </form>
        <?php else : ?>
        <p class="text-5xl"><?php echo $noteTitle; ?></p>

        <div class="note-content w-9/12 mt-8 p-4 bg-gray-100 rounded-lg">
            <p class="text-lg"><?php echo $noteContent; ?></p>
        </div>
        <div class="flex items-center mt-8 gap-4">
            <a href="../index.php?action=edit_entry&note_id=<?php echo $noteID; ?>&edit=true" class="button-secondary">Edit Note</a>
            <a href="../index.php?action=main" class="button" type="cancel">Go Back</a>
            <a href="../index.php?action=delete_note&note_id=<?php echo $noteID; ?>" class="button-secondary">Delete Note</a>
        </div>
    <?php endif; ?>


</body>

</html>
