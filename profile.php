<?php 
include ("template/header.php");
// Define the path to the JSON file
$file = 'db.json';
// Get the contents of the file and decode it into a PHP array
$data = file_get_contents($file);
$users = json_decode($data, true);

// Check if the username and password match an existing user
foreach ($users as $user) {
    // Pronadji korisnika kojiem id odgovara
    if($user['username'] == $_GET['username']) {
        // Ukoliko je "?id=broj" u linku ...
        if(isset($_GET['username'])) {
            ?>
            <!-- Opis -->
            <div class="profil">
                <h1><img width="150" src="<?php echo $user['image']; ?>"></h1>
                <h1>Ovo je profil korisnika - <?php echo $user['name'] ?></h1>
                <h3>Njegov Opis</h3>
                <p><?php echo $user['description']; ?></p><br>
                <h3>Korisnicko ime, <?php echo $user['username'] ?></h3>
                <h3>Email, <?php echo $user['email'] ?></h3>
                <h3>Rating je, <?php echo $user['rating'] ?></h3>
                <h3>Iskustvo, <?php echo $user['experience'] ?></h3>
                <h3>Zanimanje, <?php echo $user['jobTitle'] ?></h3>
                <h3>Lokacija, <?php echo $user['location'] ?></h3>
            </div>
            
        <?php
        }
    }

    // Ne trebamo vise iteratat jer je korisnik vec pronadjen i podatci su prikazani
    break;
}

include ("template/footer.php");
?>