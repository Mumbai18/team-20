<?php
/*
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'adatabase';
*/
class myClass{
	public $isConn;
	protected $datab;

	public function __construct($host = "localhost", $user = "root", $password = "", $dbname = "annadhan")
	{
		$this->isConn = TRUE;
		try {
		$this->datab = new PDO("mysql:host={$host};dbname={$dbname}", $user, $password);
		$this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
		$this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO:: FETCH_ASSOC);
		}
		catch (PDOException $e) {
			throw new Exception ($e->getMessage());
		}
	}

public function getRows($query, $params = []) {

			$stmt = $this->datab->prepare($query);
		    $stmt->execute($params);
		    return $stmt->fetchAll();
		}


	}
	?>