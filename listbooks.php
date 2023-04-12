<?php


$conn = new mysqli('localhost','root','','site');

session_start();
$user = $_SESSION['user'];
$titre = mysqli_real_escape_string($conn, $_GET['titre']);
$author = $_GET['authors'];
$img = $_POST['image'];



$req = "INSERT INTO books (titre, author, image, id_user) values ('$titre','$author', '$img', '$user')";

$conn->query($req);

$conn->close();

header("location: ./fav.php");


?>