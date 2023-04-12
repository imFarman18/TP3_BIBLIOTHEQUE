<?php

$nom= $_POST["nom"];
$email= $_POST["email"];
$mdp= $_POST["mdp"];


$hash = password_hash($mdp,PASSWORD_BCRYPT);

$conn = new mysqli("localhost","root","","site");

$req=" INSERT INTO utilisateur (nom, email, mdp) values ('$nom','$email','$hash')";

$conn->query($req);
header('Location: ./books.php');
$conn->close()
// Redirect to thankyou.html



?>