<?php
require_once "DAO.php";
if(!isset($_SESSION))
session_start();

if($_SESSION["korisnik"] != ""){
$dao = new DAO();
$studenti = $dao->getKarta($_SESSION["korisnik"]);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Id: <?= $studenti["id"] ?> <br>
    Polazak: <?= $studenti["polazak"] ?> <br>
    Odrediste: <?= $studenti["odrediste"] ?> <br>
    Vreme: <?= $studenti["vreme"] ?> <br>
    <a href="controllerKarte.php?action=logout">Logout</a>
</body>
</html>
<?php
} else {
    include "index.php";
}
?>