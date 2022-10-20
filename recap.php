<?php
// fonction permettant de recuperer tableau de session 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Recapitulatif des produits</title>
</head>
<body>
    <p><a href="index.php">Revenir au commandes</a></p>
    <?php
        // Si le tableau n'est pas set ou s'il est vide => pas de produits en session
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p>Aucun produit en session...</p>";
        }
        else{
            echo "<table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
        <tbody>";
            $totProducts = 0;
            $nbProduits = 0;
            foreach($_SESSION['products'] as $index => $product){
                echo "<tr>",
                    "<td>".$index."</td>",
                    "<td>".$product['name']."</td>",
                    "<td>".number_format($product['price'],2,",","&nbsp;")."&nbsp;€</td>",
                    "<td class='qtt'>". "<a href='traitement.php?action=delQtt&amp;id=$index'><button class='add'>-</button></a>"
                    .$product['qtt'].
                    "<a href='traitement.php?action=addQtt&amp;id=$index'><button class='add'>+</button></a>".
                    "</td>",
                    "<td>".number_format($product['total']*$product['qtt'],2,",","&nbsp;")."&nbsp;€</td>",
                    //Fait passer url a traitement pour traiter l'action
                    "<td>". "<a href='traitement.php?action=delProduit&amp;id=$index'><button class='supprimer'>supprimer</button></a>
                        </td>
                    </tr>";
                    $totProducts += $product['total'];
                    $nbProduits = $index+1;
            }
            echo "<tr>
                <td>Nombres de produits : $nbProduits</td>
                <td colspan=3>Panier total : </td>
                <td colspan=2>".number_format($totProducts,2,",","&nbsp;")."&nbsp;€</td>
            </tr> 
            </tbody>
            </table><p>"."</p>";
        }
    ?>
    <!-- <form method="GET" action="traitement.php">
        <input type="hidden" name="action" value="clear"
            class="button"/>
        <button>supprimer les produits</button>
    </form> -->

    <a href='traitement.php?action=clear'><button>supprimer les produits</button></a>

    <section class="statut">
        <?php
            if(isset($_SESSION['message'])){
                if($_SESSION['message']=='Action impossible')
                    echo "<div class='error'><p>".$_SESSION['message']."</p></div>";
                else
                    echo "<div></div>";
                $_SESSION['message'] = "";
            }
           
        ?>
    </section>
</body>
</html>