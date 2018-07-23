<?php
namespace Model;

// MovieService
// MovieFacade
// MovieManager
// MovieRepository
// MovieTable

use Nette\Database\Connection;

class MovieFacade
{
	/** @var \PDO */
	private $db;

	public function __construct(Connection $db, int $id)
	{
		$this->db = $db;
	}

	public function getRecentMovies(/*$db*/)
	{
		// Dependency Injection
		//$db = Database::getInstance();
		return $this->db->query('SELECT * FROM movie ORDER BY year');
	}
}
