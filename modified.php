<?php

$host="localhost";
$username="root";
$password="";
$db_name="test";
$tbl_name="fishing";

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form
$location=$_POST['location'];
$date=$_POST['date'];
$method=$_POST['method'];
$species=$_POST['species'];
$weight=$_POST['weight'];

// Insert data into mysql
$sql="INSERT INTO fishing (location,date,method,species,weight)
VALUES ('$location','$date','$method','$species','$weight')";

$result=mysql_query($sql);

// if successfully insert data into database, displays message "Successful".
if($result){
  echo "<h3>You added your info successfully</h3>";
  echo "<BR>";
  echo "<a href='diary.php'>Let go back to Diary</a>";
}
else {
  echo "ERROR";
}
?>
<?php
// close connection
mysql_close();
?>
