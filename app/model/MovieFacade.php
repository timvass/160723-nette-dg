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

	public function getMovieById(int $id)
	{
		// 1 or id
		return $this->db->fetch('SELECT * FROM movie WHERE id=?', $id);
	}
}
