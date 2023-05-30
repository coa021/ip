<?php
require_once "DAOStudent.php";
if(!isset($_SESSION))
session_start();

if($_SESSION["korisnik"] != ""){
$dao = new DAO();
$korisnik= $dao->getPolozeno($_SESSION["korisnik"]);

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
    Id: <?= $korisnik["id"] ?> <br>
    Broj indeksa: <?= $korisnik["brIndexa"] ?> <br>
    Predmet: <?= $korisnik["predmet"] ?> <br>
    Ocena: <?= $korisnik["ocena"] ?> <br>
    Prosecna ocena iz baze: <?php echo $ocena; ?>

    <a href="controllerRezultat.php?action=logout">Logout</a>
</body>
</html>
<?php
}
else{
    include "index.php";
}
?>