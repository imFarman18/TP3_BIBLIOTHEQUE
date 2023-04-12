<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libre-Airie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;700&display=swap" rel="stylesheet">
    <script src="./livre.js" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<link rel="stylesheet" href="./style2.css">
</head>
<body>

    <style>
        .grid-container {
          display: grid;
          grid-template-columns: repeat(4, 1fr);
          grid-gap: 1rem;
         
        }

        .card{
            border: 5px solid pink;
            border-bottom-left-radius: 40px;
            border-top-right-radius: 40px;
            
        }
        .ajouter:hover{
            background-color: rgb(18, 18, 163);

            transition: 0.2s ease-in;
        }
       .card-img-top{
        border-top-right-radius: 35px;
        }
    
    
        .ajouter{
            background-color: rgb(52, 108, 205);
            position: relative !important;
            color: white;
        }
        #text{
            list-style: None;
            text-decoration: none;
            color: skyblue;
            border: 1px solid pink;
            padding: 6px;
            position: relative;
            left: 190px;
            border-radius: 17px;

        }

      </style>
      

<!--Gradient-->
<div class="blob"></div>

<!--Random CSS for Demo-->
    <div class="container">
        <div class="content-parent">
            <div class="content">
                <?php 
                session_start();
                echo "Bonjour " . $_SESSION['nom'];
                ?>
                <a id="text" href="./deconn.php">Deconnexion</a>
                <form action="modif.php">
            
                    <input type="submit" value="Voir les comptes">

                </form>
                <a id="text" href="./fav.php">Tes Favoris</a>
                <h1>Quelle livre vous ferez plaisir ?</h1>
                <p>Choix illimité</p>
            </div>
            <div class="buttons">
                <a><input type="text" name="" id="search"></a>
                <a><Button type="submit" class="submit" >Chercher</Button ></a>
            </div>
            <ul class="list"></ul>
        </div>
        
    </div>
    <div class="main"></div>


    
</body>
<script>
var cursor = document.querySelector('.blob');

document.addEventListener('mousemove', function(e){
  var x = e.clientX;
  var y = e.clientY;
  cursor.style.transform = `translate3d(calc(${e.clientX}px - 50%), calc(${e.clientY}px - 50%), 0)`
});

</script>
</html>




