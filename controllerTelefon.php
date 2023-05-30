<?php
require_once "DAO.php";

$action = isset($_REQUEST["action"])? $_REQUEST["action"] : ""; //provera da li je setovana akcija

if(!isset($_SESSION))
session_start();
switch($_SERVER['REQUEST_METHOD']){
    case "GET":
		switch ($action){
			case "logout":
						if ($_SESSION["korisnik"]!=""){
					session_unset();
					session_destroy();
					include 'index.php';
				}
				break;
		}
		break;

        case "POST":
        switch($action){

            case "prosledi":
                $marka = isset($_POST["marka"]) ? $_POST["marka"] : "";

                if(!empty($marka)){
                    $dao = new DAO();
                    $postoji = $dao->getMarka($marka);
                    if($postoji == true){
                        $_SESSION["korisnik"] = $marka;
                        $dao->delete($marka);

                        include "prikaz.php";
                    } else{
						$msg="Telefon sa datom markom ne postoji";
						include 'index.php';
					}
                } else{
                    $msg="Morate popuniti polje!";
					include 'index.php';
                }
        }

}

//funkcija za preradu unetih podataka
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>