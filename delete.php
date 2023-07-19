<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bloodgroup";

$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_GET['id'])){

    $id = $_GET['id'];
    $delete = "DELETE FROM tabledata WHERE ID = $id";
    mysqli_query($conn, $delete);
    header('location:index.php');
}
?>