<!DOCTYPE html>
<html>
<body>
<?php

echo "<h1>GDPR agreement </h1></br>";
$servername = "localhost";
$username = "###";
$password = "###";
$dbname = "users";

//session_start();
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
$id = intval($_GET['id']);
//echo $id;
$sql = "SELECT * FROM oldusers WHERE id=$id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Όνομα: " . $row["name"]. "</br>  Email: " . $row["email"]. "<br><br>";
    }
} else {
    echo "0 results";
}

//$_SESSION['id'] = $id;

echo "Συμφωνείτε με τους όρους;</br>";
?>
<form action = "checkbox.php" method ="post">
<input type = "radio" name= "chk1[]" value ="1" checked> agree <br/>
<input type = "radio" name= "chk1[]" value ="0"> no agree <br/>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<br>
<input type ="submit" name="Submit" value ="Submit">
</form>
<?php
mysqli_close($conn);
?>
</body>
</html>
