<?php
session_start();

if(isset($_GET['action'])){
    switch($_GET['action']){
        case "add":
            // verifier si le param id est bien dans l'url et si 
            if(isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])){
                // Incrémenter la qtt d'un produit
                $_SESSION['products'][$_GET['id']]['qtt']++;
                // redirection 
                header("Location: recap.php");
                die();
            }
            else $_SESSION["message"] = "Action impossible";
            break;
        case "delete":
            if(isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])){
                if($_SESSION['products'][$_GET['id']]['qtt']>0)
                    $_SESSION['products'][$_GET['id']]['qtt']--;
                else echo "Il n'y a deja plus de ".$_SESSION['products']['name'];
                header("Location: recap.php");
                die();
            }
            else $_SESSION["message"] = "Action impossible";
            break;
        case "clear":
            //Permet d'enlever tous les produits du tableau de session
            if(!empty($_SESSION['products'])){
                unset($_SESSION['products']);
                header("Location: recap.php");
                die();
            }
            else $_SESSION["message"] = "Action impossible";
            break;
    }
}
// verifie si la clé submit existe dans le tableau crée par formulaire
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
header("Location:recap.php");
