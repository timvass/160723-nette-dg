<?php

namespace App\Presenters;

use Model\MovieFacade;
use Nette\Application\UI\Presenter;


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
		$this->template->movies = $this->facade->getRecentMovies();
		//		dump($movies);
//		require 'template.phtml';
	}
}
