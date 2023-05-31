<?php
/*  require_once 'NekaKlasa.php';
    require_once 'NekaSimuliranaBaza.php'; 
    ...*/

$action = isset($_REQUEST["action"])? $_REQUEST["action"] : ""; //provera da li je setovana akcija


if ($_SERVER['REQUEST_METHOD']=="POST"){
    //akcije za unos i izmenu
    if ($action == 'akcijaPost1') {
       // $podatak = isset($_POST["podatak"])? test_input($_POST["podatak"]) : ""; //provera da li su setovani podaci
       //...
    } elseif ($action == 'akcijaPost2') {
        // $podatak = isset($_POST["podatak"])? test_input($_POST["podatak"]) : ""; //provera da li su setovani podaci
        //...
    } 
    
} elseif ($_SERVER['REQUEST_METHOD']=="GET"){
    //akcije za prikaz i brisanje
    if ($action == 'akcijaGet1') {
        //...
    } elseif ($action == 'akcijaGet2'){
        //...
    }elseif ($action == 'akcijaGet3'){
        //...
    }
    
} else {
    //...
    header("Location: index.php"); //opciono
    die();
}

//funkcija za preradu unetih podataka
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>