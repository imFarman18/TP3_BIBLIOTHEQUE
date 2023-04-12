<?php
$connexion = new mysqli("localhost", "root", "", "site");
$requete1 = "SELECT * FROM utilisateur" ;

$Users = $connexion->query($requete1);
                foreach($Users as $User){
                    ?>
                    <tr>
                        <td><?=$User['id']?></td>
                        <td><?=$User['nom']?></td>
                        <td><?=$User['email']?></td>
                        <td><a href="./modiff.php?id=<?=$User['id']?>">modification</a></td>
                    </tr>
                    <?php
                }
            ?>