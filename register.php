<?php
// Define the path to the JSON file
$file = 'db.json';

// Get the contents of the file and decode it into a PHP array
$data = file_get_contents($file);
$users = json_decode($data, true);

// Check if the form has been submitted
// Get the form data
if(isset($_POST['register'])) {
    $image = $_POST['image'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $name = $_POST['name'];
    $description = $_POST['description'];
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $experience = $_POST['experience'];
    $jobTitle = $_POST['jobTitle'];
    $location = $_POST['location'];
    
    // Create a new user object
    $newUser = array(
        'image' => $image,
        'username' => $username,
        'password' => $password,
        'name' => $name,
        'description' => $description,
        'email' => $email,
        'rating' => $rating,
        'experience' => $experience,
        'jobTitle' => $jobTitle,
        'location' => $location
    );
    
    // Add the new user to the array
    $users[] = $newUser;
    
    // Save the updated array back to the file
    $jsonData = json_encode($users, JSON_PRETTY_PRINT);
    file_put_contents($file, $jsonData);
    
    // Start the session and set the logged in user ID
    unset($newUser['password']);
    $_SESSION['user'] = $newUser;
    
    // Redirect to the profile page
    header('Location: index.php');
    exit;
}
?>

<?php include ("template/header.php"); ?>

<h1>REGISTRACIJA</h1>

<form method="post">
    <label>Korisničko ime:</label>
    <input type="text" name="username" required><br>

    <label>Lozinka:</label>
    <input type="password" name="password" required><br>

    <label>Profilna slika (link):</label>
    <input type="text" name="image" required><br>
    
    <label>Opis: </label>
    <textare rows="4" cols="50" type="text" name="description" required><br>

    <label>Ime i prezime:</label>
    <input type="text" name="name" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Ocjena:</label>
    <input type="number" name="rating" step="0.1" min="0" max="5" required><br>

    <label>Iskustvo (u godinama):</label>
    <input type="number" name="experience" min="0" required><br>

    <label>Radno mjesto:</label>
    <input type="text" name="jobTitle" required><br>

    <label>Lokacija:</label>
    <input type="text" name="location" required><br>

    <input type="submit" name="register" value="Registriraj se">
</form>

<?php include ("template/footer.php"); ?>