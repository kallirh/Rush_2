<?php
class Database
{
	public $pdo;
	private $host;
	private $database;
	private $username;
	private $password;

	public function __construct($database = "database_music", $username = "root", $password = "")
	{
		$this->connection($database, $username, $password);
	}

	public function connection($database, $username, $password)
	{
		try
		{
			$this->pdo = new PDO('mysql:host=127.0.0.1;dbname='.$database.';charset=utf8', $username, $password);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e)
		{
			die("Connexion échouée : ". $e->getMessage());
		}

	}

	public function select($column, $table)
	{
		$query = "SELECT ".$column." FROM ".$table;
		//var_dump($query);
		$result = $this->pdo->prepare($query);
		$result->execute();
		return $result->fetchAll();	
	}


	public function insert($table, $column, $values)
	{
		$query = "INSERT INTO ".$table." (".$column.") VALUES (".$values.");";
		$insert = $this->pdo->prepare($query);
		return $insert;	
	}

	public function update($table, $values, $condition)
	{
		$query = "UPDATE ".$table." SET ".$values." WHERE ".$condition."";
		$update = $this->pdo->prepare($query);
		return $update;	
	}

	public function delete($table, $condition)
	{
		$query = "DELETE ".$table." WHERE ".$condition."";
		$delete = $this->pdo->prepare($query);
		return $delete;	
	}

	// Fonction qui retourne requête en JSON
	public function return_json($success, $msg, $results=null)
	{
		$msg = "results";
		$return['success'] = $success; // Indicateur true ou false
		$return['message'] = $msg; // Message (ex: 'Liste artiste', ou 'Liste des albums')
		$return['results'] = $results; // Resultats requête (tableau)
		$contenu_json =json_encode($return);

		$nom = $msg.'.json';
		$fichier = fopen($nom, 'w+');
		fwrite($fichier, $contenu_json);
		fclose($fichier);
		return $return;
		//echo json_encode($return); 

	}
}

$pdo = new Database();
