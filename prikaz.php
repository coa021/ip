<?php

require_once "DAO.php";
if(!isset($_SESSION)) session_start(); 


if ($_SESSION["korisnik"]!=""){
	$dao=new DAO();
	$telefon=$dao->getMarka($_SESSION['korisnik']);
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
<?php echo "Uspesno ste izbrisali sve telefone ove marke!" ?> <br>
<a href="controllerTelefon.php?action=logout">LOGOUT</a>
</body>
</html>

<?php

}else{
	header("Location:index.php");
}
?>