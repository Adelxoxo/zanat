<?php 
include ("template/header.php");

if(isset($_SESSION['user'])) {
?>
<!-- Opis -->
<div class="profil">
    <h1><img src="<?php echo $_SESSION['user']['image']; ?>"></h1>
    <h1>Dobrodosli na vas profil, <?php echo $_SESSION['user']['name'] ?></h1>
    <h3>Moj Opis</h3>
    <p><?php echo $_SESSION['user']['description']; ?></p><br>
    <h3>Vas username, <?php echo $_SESSION['user']['username'] ?></h3>
    <h3>Vas email, <?php echo $_SESSION['user']['email'] ?></h3>
    <h3>Vas rating je, <?php echo $_SESSION['user']['rating'] ?></h3>
    <h3>Vas experience, <?php echo $_SESSION['user']['experience'] ?></h3>
    <h3>Vas jobTitle, <?php echo $_SESSION['user']['jobTitle'] ?></h3>
    <h3>Vas location, <?php echo $_SESSION['user']['location'] ?></h3>
</div>

<?php
}
include ("template/footer.php");
?>