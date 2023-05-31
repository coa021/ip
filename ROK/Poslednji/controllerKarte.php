<?php
require_once "DAO.php";
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
                $id = isset($_POST["id"]) ? $_POST["id"] : "";
               
                if(!empty($id)){
                    $dao = new DAO();
                    $postoji = $dao->getKarta($id);
                    if($postoji == true){
                        
                        $_SESSION["korisnik"] = $id;
                        include "prikaz.php";
                    } else {
                        $msg = "Ne posotji student sa tim brojem id";
                        include "index.php";
                    }
                    
                     
                } else {
                    $msg = "Morate popuniti sva polja!";
                    include "index.php";
                }
                break;

            }
            break;
}
   

?>