<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Tes Favoris</title>
</head>
<style>

div{
    display: grid;
    
    grid-gap: 1rem;
    margin-bottom: 10px;
  
}

a{
    list-style: none;
    text-decoration: none;
    color: aqua;
    border: 2px solid pink;
    border-radius: 15px;
    padding: 12px;
    width: 160px;
    
}
.center{
    position: relative;
    left: 350px;
}


</style>
<body>
    <div>
        <a  href="./deconn.php">Deconnexion</a>
        <a href="./books.php">Retour à la recherche</a>
        
        <?php
            $conn = new mysqli('localhost','root','','site');
            session_start();
            $user = $_SESSION['user'];
            $req = "SELECT * FROM books where id_user = $user";
            $response = mysqli_query($conn, $req);
            foreach($response as $response1){
                $img=$response1['image'];
                echo "<div class ='All-cards>";
                echo "<div class ='cards>";
                echo "<img class='center' src= '$img'>" ."</img>" ;
                echo "<h1 class='center'>" . $response1['titre']. "</h1>";
                echo "<h2 class='center'>" . $response1['author']. "</h2>";
                echo "<span class='center'>" .'Id:'. "</span>";
                echo "<span class='center'>" .$response1['id_user']. "</span>";
                echo '<form method="GET" action="info2.php">';
                echo '<input  type="hidden" name="id" value="' . "{$response1['id']}" . '">';
                echo '<input  type="hidden"name="traitement" value = "suppression">';
                echo '<button class="center" type="submit">Supprimer de tes favoris</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '<hr>';
                echo '<br>';

            }


        ?>
    
    </div>
</body>
</html>