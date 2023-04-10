<?php
include ("template/header.php");

// Define the path to the JSON file
$file = 'db.json';

// Get the contents of the file and decode it into a PHP array
$data = file_get_contents($file);
$users = json_decode($data, true);

// Initialize variables for login
$loginError = '';
$loggedInUser = '';

if (isset($_POST['username']) && isset($_POST['password'] )) {
    // Get the login form data
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Check if the username and password match an existing user
    foreach ($users as $user) {
        if ($user['username'] == $username && $user['password'] == $password) {
            // Start the session and set the logged in user ID
            session_start();
            unset($user['password']);
            $_SESSION['user'] = $user;

            // Set the logged in user variable
            $loggedInUser = $user;

            // Redirect to the profile page
            header('Location: index.php');
            exit;
        }
    }

    // If no user was found, show an error message
    $loginError = 'Pogrešno korisničko ime ili lozinka.';
} else {
    $loginError = 'Nisu sva polja ispunjena, pokusajte ponovo.';  
}

?>
<div id="login">
    <h1>PRIJAVA</h1>

    <form action="login.php" method="post">
    <label for="username">Korisničko ime:</label>
    <input type="text" id="username" name="username" required><br><br>
    
    <label for="password">Lozinka:</label>
    <input type="password" id="password" name="password" required><br><br>
    
    <input type="submit" value="Prijava">
    </form>
</div>

<?php
include ("template/footer.php");
?>
