<?php
// connexion bdd
$conn = new mysqli('localhost','root','','site');
// switch pour savoir quel action on effectue
switch($_GET['traitement']){
    case 'ajout':
        // récupération des informations du formulaire dans index.php
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        // chiffrer le mdp:
        $cout = ['cost'=>10];
        $hash = password_hash($mdp, PASSWORD_BCRYPT, $cout);
        // requete sql
        $req = "INSERT INTO utilisateur (nom, email, mdp) VALUES ('$nom','$email','$hash')";
        // execution de la requete
        $conn->query($req);
        // fermeture connexion
        
        session_start();

        $req1 = "SELECT id from utilisateur where email ='$email'";
        $res= $conn->query($req1);
        $user = mysqli_fetch_assoc($res);
        
        $_SESSION['user']= $user['id'];
        $_SESSION['nom']=$nom;

        header('Location: ./books.php');
        break;
    case 'suppression':
        $id = $_GET['id'];

        $req = "DELETE FROM books WHERE id='$id'";
        // execution de la requete
        $conn->query($req);
        // fermeture connexion
        $conn->close();
        // renvoyez vers la page index.php
        header('Location: ./fav.php');
        break;
    case 'modifier':
        // recuperation des valeurs dans modif.php
        $id = $_GET['id'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        // requete
        $cout = ['cost'=>10];
        $hash = password_hash($mdp, PASSWORD_BCRYPT, $cout);
        $req = "UPDATE utilisateur set nom= '$nom',email='$email', mdp='$hash' WHERE id='$id'";
        //execution
        $conn->query($req);
        //close
        $conn->close();
        //renvoie de page
        header('Location: ./books.php');
        break;
    case 'connexion':
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        $req = "SELECT mdp, nom, id from utilisateur where email='$email'";
        $res= $conn->query($req);
        $user = mysqli_fetch_assoc($res);

        if(password_verify($mdp, $user['mdp'])){
            session_start();

            $_SESSION['user']=$user["id"];
            $_SESSION['nom']= $user['nom'];






            
            header('Location: ./books.php');
            // variable session
        }
        else{
            header('Location: ./Login.html');
        }
        break;



}