<?php

class Banco {

	private $hostname = HOST;
	private $username = USER;
	private $password = PASS;
	private $database = BASE;

	private $drive = DRIVE;

	private static $conexao = NULL;

	private static $instancia = NULL;

	private static $dataset = NULL;

	private function __construct() {

		$hostname = $this->hostname;
		$username = $this->username;
		$password = $this->password;
		$database = $this->database;

		$drive = $this->drive;

		$dsn = "$drive:host=$hostname;dbname=$database";

		try {

			$conexao = new PDO($dsn, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			self::$conexao = $conexao;

		} catch (PDOException $e) {

			echo $e->getMessage();

		}

	}

	public static function instancia() {

		if (!isset(self::$instancia) && is_null(self::$instancia)) {

			$classe = __CLASS__;

			self::$instancia = new $classe;

		}

		return self::$instancia;

	}

	private function executaSQL($sql) {

		$executaSql = self::$conexao->prepare($sql);

		$string = strtolower(substr($sql, 0, 6));

		reset($this->array_campo_valores);

		for ($i = 0; $i < count($this->array_campo_valores); $i++) {

			switch ($string) {
				case "insert":
					$executaSql->bindValue(":" . key($this->array_campo_valores), $this->array_campo_valores[key($this->array_campo_valores)]);
					break;
				case "update":
					$executaSql->bindValue(":" . key($this->array_campo_valores), $this->array_campo_valores[key($this->array_campo_valores)]);
					$executaSql->bindValue(":" . $this->campopk, $this->valorpk);
					break;
				case "delete":
					$executaSql->bindValue(":" . $this->campopk, $this->valorpk);
					break;
				case "select":
					$executaSql->bindValue(":" . key($this->array_campo_valores), $this->array_campo_valores[key($this->array_campo_valores)]);
					break;
			}

			next($this->array_campo_valores);

		}

		if ($executaSql->execute()) {
				
			$this->linhasAfetadas = +1;
			self::$dataset = $executaSql;
				
			return true;
				
		}else {
			return false;
		}

	}

	public function insert() {

		$sql = "INSERT INTO $this->tabela ( ";

		reset($this->array_campo_valores);

		for ($i = 0; $i < count($this->array_campo_valores); $i++) {

			$sql .= key($this->array_campo_valores);

			if ($i < count($this->array_campo_valores) -1) {

				$sql .= ", ";

			}

			next($this->array_campo_valores);

		}

		$sql .= " ) VALUES ( ";

		reset($this->array_campo_valores);

		for ($i = 0; $i < count($this->array_campo_valores); $i++) {

			$sql .= ":" . key($this->array_campo_valores);

			if ($i < count($this->array_campo_valores) -1) {

				$sql .= ", ";

			}

			next($this->array_campo_valores);

		}

		$sql .= " )";

		return $this->executaSql($sql);

	}

	public function delete() {

		$sql = "DELETE FROM $this->tabela WHERE $this->campopk = :$this->campopk";

		return $this->executaSql($sql);

	}

	public function update() {

		$sql = "UPDATE $this->tabela SET ";

		reset($this->array_campo_valores);

		for ($i = 0; $i < count($this->array_campo_valores); $i++) {

			$sql .= key($this->array_campo_valores) . " = :" . key($this->array_campo_valores);

			if ($i < count($this->array_campo_valores) -1) {

				$sql .= ", ";

			}

			next($this->array_campo_valores);

		}

		$sql .= " WHERE $this->campopk = :$this->campopk";

		return $this->executaSql($sql);

	}

	public function select($especial = NULL) {

		$sql = "SELECT ";

		if (is_null($especial)) :
			
		$sql .= "*";

		elseif($especial == "all") :

		reset($this->array_campo_valores);

		for ($i = 0; $i < count($this->array_campo_valores); $i++) {

			$sql .= key($this->array_campo_valores);

			if ($i < count($this->array_campo_valores) -1) {
					
				$sql .= ", ";
					
			}

			next($this->array_campo_valores);

		}
			
		elseif($especial == "count") :

		$sql .= "count(*)";
			
		endif;

		$sql .= " FROM $this->tabela";

		if (!is_null($this->extrasSelect)) {

			$sql .= " $this->extrasSelect";

		}

		return $this->executaSql($sql);

	}

	public function rows() {

		return self::$dataset->rowCount();

	}

	public function fetch( $tipo = "OBJ" ) {

		switch ($tipo) {
			case "OBJ":
				return self::$dataset->fetch(PDO::FETCH_OBJ);
				break;
			case "ASSOC":
				return self::$dataset->fetch(PDO::FETCH_ASSOC);
				break;
			default:
				return self::$dataset->fetch(PDO::FETCH_OBJ);
				break;
		}

	}

	public function fetchAll( $tipo = "OBJ" ) {
		
		switch ($tipo) {
			case "OBJ":
				return self::$dataset->fetchAll(PDO::FETCH_OBJ);
				break;
			case "ASSOC":
				return self::$dataset->fetchAll(PDO::FETCH_ASSOC);
				break;
			default:
				return self::$dataset->fetchAll(PDO::FETCH_OBJ);
				break;
		}

	}

}