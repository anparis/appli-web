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
    <title>Recapitulatif des produits</title>
</head>
<body>
    <?php var_dump($_SESSION); ?>
    <p><a href="index.php">Revenir au commandes</a></p>
    <?php
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p>Aucun produit en session...</p>";
        }
        else{
            echo "<table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>#</th>
                    <th>#</th>
                    <th>#</th>
                    <th>#</th>
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
                    "<td>".$product['qtt']."</td>",
                    "<td>".number_format($product['total'],2,",","&nbsp;")."&nbsp;€</td>",
                    "</tr>";
                    $totProducts += $product['total'];
                    $nbProduits = $index+1;
            }
            echo "<tr>
                <td>Nombres de produits : $nbProduits</td>
                <td colspan=3>Panier total : </td>
                <td>".number_format($totProducts,2,",","&nbsp;")."&nbsp;€</td>
            </tr> 
            </tbody>
            </table>";
        }
        if(isset($_POST['dropTable'])) {
                unset($_SESSION['products']);
        }
    ?>
    <form method="post">
        <input type="submit" name="dropTable"
            class="button" value="Supprimer tous les produits" />
    </form>
</body>
</html>