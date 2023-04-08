<?php 
include ("template/header.php");
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

      <?php

// Read the contents of the JSON file
$jsonData = file_get_contents('db.json');

// Decode the JSON data into a PHP array
$users = json_decode($jsonData, true);

// Generate HTML table for displaying users data
$html = '<table id="usersTable">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Rating</th>
                    <th>Experience</th>
                    <th>Job Title</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>';

foreach ($users as $user) {
    $html .= '<tr>';
    $html .= '<td>' . $user['username'] . '</td>';
    $html .= '<td>' . $user['name'] . '</td>';
    $html .= '<td>' . $user['email'] . '</td>';
    $html .= '<td>' . $user['rating'] . '</td>';
    $html .= '<td>' . $user['experience'] . '</td>';
    $html .= '<td>' . $user['jobTitle'] . '</td>';
    $html .= '<td>' . $user['location'] . '</td>';
    $html .= '</tr>';
}

$html .= '</tbody></table>';

echo $html;
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