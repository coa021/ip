<?php
require_once "DAOStudent.php";

$action = isset($_REQUEST["action"])? $_REQUEST["action"] : ""; //provera da li je setovana akcija

if(!isset($_SESSION))
session_start();

switch($_SERVER['REQUEST_METHOD']){
        case "GET":

            switch($action){
                    case "logout":
                if($_SESSION["korisnik"] != ""){
                        session_unset();
                        session_destroy();
                        include "index.php";
                }
                break;
            }
            break;
            case "POST":
                switch($action){
                    case "prosledi":
                    $brIndexa = isset($_POST["brIndexa"]) ? $_POST["brIndexa"] : "";
                    if(!empty($brIndexa)){
                        $dao = new DAO();
                        $postoji = $dao-> getPolozeno($brIndexa);
                        if($postoji == true){
                            $_SESSION["korisnik"] = $brIndexa;
                            $ocena = $dao->prosek();
                            include "prikaz.php";
                        } else{
                            $msg = "Ne posotji osoba sa tim indeksom";
                            include "index.php";
                        }
                        
                    } else {
                        $msg = "Morate popuniti polje!";
                        include "index.php";
                    }
                    break;
                }
                break;
}
   
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>