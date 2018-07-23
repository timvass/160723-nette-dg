<?php

namespace App\Presenters;

use Model\MovieFacade;
use Nette\Application\UI\Presenter;
use function Sodium\crypto_box_publickey_from_secretkey;


class MoviePresenter extends Presenter
{
	/** @var MovieFacade */
	private $facade;

	function __construct(MovieFacade $facade)
	{
		$this->facade = $facade;
	}

	function renderList()
	{
		$this->template->movies = $this->facade->getRecentMovies()->fetchAll();

		$this->template->addFilter('money', function ($val) {
			return number_format($val, 2, ',', '');
		});
	}

	public function renderDetail(int $id)
	{
		$movie = $this->facade->getMovieById($id);
		if(! $movie) {
			$this->error();
		}
		$this->template->movie = $movie;
	}
}
