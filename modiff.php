<?php
//connexion bdd
$conn = new mysqli('localhost','root','','site');
// récupération id via le a href
$id = $_GET['id'];
//réaliser la requete sql
$req = "SELECT * FROM utilisateur WHERE id=$id";
//executer la requête
$Users = $conn->query($req);
// récupérer directement le seul utilisateur dans un tableau
$LUser = mysqli_fetch_assoc($Users);
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./info2.php?traitement=modifier&id=<?=$LUser['id']?>" method="post">  
        <input type="text" name="nom" placeholder="nom" value="<?=$LUser['nom']?>">
        <input type="email" name="email" placeholder="email" value="<?=$LUser['email']?>">
        <input type="password" name="mdp" placeholder="mot de passe" value="<?=$LUser['mdp']?>">
        <input type="submit" value="modifier un utilisateur">
    </form>
</body>