<?php 
include ("template/header.php");

// Read the contents of the JSON file
$jsonData = file_get_contents('db.json');


// Decode the JSON data into a PHP array
$users = json_decode($jsonData, true);
?>
<!-- Opis -->
<div class="opis">
<h1>
    Najveća baza zanatskih poslova u BiH 2
    </h1>
</div>
<!-- Search Bar -->
<div class="search-bar">
  <form action="#" method="get">
    <input type="text" id="searchInput" name="search" placeholder="Pretraga...">
    <button type="submit"><i class="fas fa-search"></i>🔍</button>
  </form>
</div>

<table id="usersTable">
<thead>
  <tr>
    <th></th>
    <th>Username</th>
    <th>Name</th>
    <th>Email</th>
    <th>Rating</th>
    <th>Experience</th>
    <th>Job Title</th>
    <th>Location</th>
  </tr>
</thead>
<tbody>

<?php 

// Za svakog korisnika ce napraviti novi tableRow, sa podatcima unutar tabele ...
foreach ($users as $user) { 

?>

<tr>
  <td><img width="50" src="<?php echo $user['image'];?>"></td>
  <td><a href="profile.php?id=<?php echo $user['id']; ?>"><?php echo $user['username'];?></a></td>
  <td><?php echo $user['name'];?></td>
  <td><?php echo $user['email'];?></td>
  <td><?php echo $user['rating'];?></td>
  <td><?php echo $user['experience'];?></td>
  <td><?php echo $user['jobTitle'];?></td>
  <td><?php echo $user['location'];?></td>
</tr>

<?php 
  // Zatvoren foreach loop
  } 
?>
<script>
$(document).ready(function(){
  $("#searchInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#usersTable tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<?php
include ("template/footer.php");
?>