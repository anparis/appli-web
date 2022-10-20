<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appli web</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
// fonction permettant de recuperer tableau de session 
    session_start();
?>
    <a href="recap.php">Recapitulatif de vos commandes</a>
    <section class="choix">
    <h1>Ajouter un produit</h1>
    <form action="traitement.php" method="post">
        <p>
            <label>
                Nom du produit :
                <input type="text" name="name">
            </label>
        </p>
        <p>
            <label>
                Prix du produit :
                <input type="number" step="any" name="price">
            </label>
        </p>
        <p>
            <label>
                Quantite desiree :
                <input type="number" name="qtt" value="1">
            </label>
        </p>
        <p>
            <input type="submit" name="submit" value="Ajouter le produit">
        </p>
    </form>
    </section>
    <div class="message">
        <?php
            if(isset($_SESSION['message'])){
                echo $_SESSION['message'];
                $_SESSION['message'] = "";
            }
        ?>
    </div>

</body>
</html>