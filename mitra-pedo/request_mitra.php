<html>
<style>
form {
  display: inline!important;
}
</style>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pedo";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, name, level FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    
    $lepel = $row["level"];
    
    switch ($lepel) {
       case "Petoffer":
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $lepel . "\n" ; 
          echo "<form action='request_mitra.php' method='POST'> \n";
          echo "<input type='text' name='id' value='" . $row["id"] . "'/>\n<input type='text' name='action' id='action'/>\n<input type='button' value='APPROVE' onClick='this.form.action.value=\"APPROVE\"'/>\n<input type='button' value='REJECT' onClick='this.form.action.value=\"REJECT\"'/>\n</form><br>\n";  
        break;
       case "Petofferapproved":
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $lepel . "\n";
          echo "<form action='request_mitra.php' method='POST'>\n";
          echo "<input type='text' name='id' value='" . $row["id"] . "'/>\n<input type='text' name='action' id='action'/>\n<input type='button' value='CANCEL' onClick='this.form.action.value=\"CANCEL\";'/>\n</form><br>\n";  
        break;
       default:     
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $lepel . "<br> \n";
        break;
    }

    /*
    if ( $lepel == "Petoffer") { 
        echo " APPROVE / REJECT" . "<br>";    
    } else {
      if ( $lepel == "Petofferapproved") {
        echo " CANCEL " . "<br>";
      } else
        echo "<br>";
    }
    */
     
   }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
</body>
</html>