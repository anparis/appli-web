<?php
session_start();
// verifie si la clé submit existe dans le tableau   
if(isset($_POST['submit'])){

    $name = filter_input(INPUT_POST,"name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST,"price",FILTER_VALIDATE_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
    $qtt = filter_input(INPUT_POST,"qtt",FILTER_VALIDATE_INT);

    // empêche valeurs null
    if($name && $price && $qtt){
        $product = [
            "name" => $name,
            "price" => $price,
            "qtt" => $qtt,
            "total" => $price*$qtt
        ];
        //on sollicite la variable globale $_SESSION
        //sert a récuperer les produits entrés par utilisateur dans un tableau de 'products'
        $_SESSION['products'][] = $product;
    }
}
header("Location:index.php");
