<?php
require_once 'db.php';

class DAO {
	private $db;

	// za 2. nacin resenja
	private $INSERTOSOBA = "INSERT INTO osoba (ime, prezime, JMBG, vremeUpisa) VALUES (?, ?, ?, CURRENT_TIMESTAMP)";
	private $DELETEOSOBA = "DELETE  FROM osoba WHERE idosoba = ?";
	private $SELECTBYID = "SELECT * FROM osoba WHERE idosoba = ?";	
	private $GETLASTNOSOBA = "SELECT * FROM osoba ORDER BY idosoba DESC LIMIT ?";

    private $KARTEEXISTS = "SELECT * FROM karte WHERE id=?";

    private $SVEKARTE = "SELECT * FROM karte WHERE polazak=?";
	
	public function __construct()
	{
		$this->db = DB::createInstance();
	}

	

    public function getKarta($id){
        $statement = $this->db->prepare($this->KARTEEXISTS);
		$statement->bindValue(1, $id);
		
		$statement->execute();
		
		$result = $statement->fetch();
		return $result;
    }
    public function nadjiSve($polazak){
        $statement = $this->db->prepare($this->SVEKARTE);
		$statement->bindValue(1, $polazak);
		
		$statement->execute();
		$result = $statement->fetch();
		return $result;
		
    }

	public function insertOsoba($ime, $prezime, $JMBG)
	{
		// 1. nacin
		/*
		$statement = $this->db->prepare("INSERT INTO osoba (ime, prezime, JMBG, vremeUpisa) VALUES (:ime, :prezime, :JMBG, CURRENT_TIMESTAMP)");
		$statement->execute(array(':ime'=>$ime, ':prezime'=> $prezime, ':JMBG'=>$JMBG));
		*/
		
		// 2. nacin
		$statement = $this->db->prepare($this->INSERTOSOBA);
		$statement->bindValue(1, $ime);
		$statement->bindValue(2, $prezime);
		$statement->bindValue(3, $JMBG);
		
		$statement->execute();
	}

	public function deleteOsoba($idosoba)
	{
		// 1. nacin
		/*
		$statement = $this->db->prepare("DELETE  FROM osoba WHERE idosoba = :idosoba");
		$statement->execute(array(':idosoba' => $idosoba));
		*/
		
		// 2. nacin
		$statement = $this->db->prepare($this->DELETEOSOBA);
		$statement->bindValue(1, $idosoba);
		
		$statement->execute();
	}

	public function getOsobaById($idosoba)
	{
		// 1. nacin
		/*
		$statement = $this->db->prepare("SELECT * FROM osoba WHERE idosoba = :idosoba");
		$statement->execute(array(':idosoba' => $idosoba));
		
		$result = $statement->fetch();
		return $result;
		*/
		
		// 2. nacin
		$statement = $this->db->prepare($this->SELECTBYID);
		$statement->bindValue(1, $idosoba);
		
		$statement->execute();
		
		$result = $statement->fetch();
		return $result;
	}
}
?>
