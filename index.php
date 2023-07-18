<?php
require_once 'model/database.php';
require_once 'model/register.php';
require_once 'model/login.php';
require_once 'model/notes.php';

session_start();

$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
elseif (isset($_POST['action'])) {
    $action = $_POST['action'];
}
else{
    $action = 'welcome';
}


switch($action)
{
 case 'welcome':
    header("Location: view/welcome.php");
    break;
case 'register':
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // Data integrity checks
        $username = $_POST['username'];
        $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = $_POST['email'];
        $password = $_POST['password'];
        $date_format = $_POST['data_format'];

        if (!isUsernameValid($username)) {
            $err = 'Invalid username!';
            header("Location: view/register.php?err=$err");
            exit();
        }
        if (!isEmailValid($email)) {
            $err = 'Invalid email!';
            header("Location: view/register.php?err=$err");
            exit();
        }

        // Check if the username is taken
        $conn = createDatabaseConnection();
        if (isUsernameTaken($username, $conn)) {
            $err = 'Username is taken!';
            header("Location: view/register.php?err=$err");
            exit();
        }

        // Register the user
        if (registerUser($username, $password, $fullname, $email, $date_format, $conn)) {
            // TODO: Here display proper message about successful register
            header("Location: index.php");
            exit();
        } else {
            echo "Error: Unable to register user.";
        }
        exit();
    } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
        header("Location: view/register.php");
        exit();
    }
    break;
case 'login':
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Data integrity checks
        $username = filter_input(INPUT_POST, 'username');
        $password = $_POST['password'];

        // Login the user
        $conn = createDatabaseConnection();
        $result = loginUser($username, $password, $conn);
        
        if ($result['success']) {
            $_SESSION['username'] = $result['username'];
            $_SESSION['full_name'] = $result['full_name'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['date_format'] = $result['date_format'];
            $_SESSION['logged_in'] = true;

            // Redirect to main.php
            header("Location: index.php?action=main");
            exit();
        } else {
            $err = $result['message'];
            header("Location: view/login.php?err=$err");
            exit();
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
        header("Location: view/login.php");
        exit();
    }
    break;
    case 'main':
        header("Location: view/main.php");

        break;
    case "logout":
        // Destroy the session and logout the user
        session_destroy();

        // Redirect to the welcome page
        header("Location: index.php?action=welcome");
        break;
    case "new_entry":
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the form data
            $user = $_SESSION['username'];
            $title = filter_input(INPUT_POST, 'new-title', FILTER_SANITIZE_SPECIAL_CHARS);
            $content = filter_input(INPUT_POST, 'new-content', FILTER_SANITIZE_SPECIAL_CHARS);
        
            // Call the Model function to create a new note
            if (createNewNote($user, $title, $content)) {
                // Redirect to the main page after successful note creation
                header("Location: index.php?action=main");
                exit();
            } else {
                echo "Note creation failed.";
            }
        }
        else{
            header("Location: view/new-entry.php");
        }
        break;
    case "edit_entry":
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newTitle = filter_input(INPUT_POST, 'new-title', FILTER_SANITIZE_SPECIAL_CHARS);
            $newContent = filter_input(INPUT_POST, 'new-content', FILTER_SANITIZE_SPECIAL_CHARS);

            if (isset($_GET['note_id'])) {
                $noteID = $_GET['note_id'];
            } 

            // Update the note with the new title and content
            if (updateNoteContent($noteID, $newTitle, $newContent)) {
                // Note update successful, redirect back to the view mode
                header("Location: index.php?action=edit_entry&note_id=$noteID");
                exit();
            } else {
                echo "Note update failed.";
            }
        }
        else{       
            if (isset($_GET['note_id'])) {
                // Store the selected note ID in the $_SESSION variable
                $_SESSION['selected_note_id'] = $_GET['note_id'];
            }   
            if (isset($_GET['edit'])) {
                // Store the selected note ID in the $_SESSION variable
                $_SESSION['edit'] = $_GET['edit'];
            } 
        }
        header("Location: view/edit-entry.php");
        break;
    case "delete_note":
        if (isset($_GET['note_id'])) {
            deleteNoteByID($_GET['note_id']);
        }   

        header("Location: view/main.php");
        break;
}

?>