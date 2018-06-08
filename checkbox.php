<?php

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
//$id = $_SESSION['id'];
 $id = $_POST['id'];
//echo $id;
$checkbox1 = $_POST['chk1'];
//echo $checkbox1[0];
$agree = $checkbox1[0];
if($_POST["Submit"] == "Submit"){
//for ($i = 0; $i <count($checkbox1);$i++){
//        if(!empty($checkbox1)){
//echo $checkbox1;
$sql = "UPDATE oldusers SET agree='$agree' WHERE id='$id'";
//mysqli_query($query) or die (mysqli_error());
//$result=mysql_query($sql);

if (mysqli_query($conn, $sql)) {
    echo "success.";
}
else {
    echo "Could not update: " . mysqli_error($conn);
}
mysqli_close($conn);

}

?>
