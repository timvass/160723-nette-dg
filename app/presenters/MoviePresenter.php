<?php

namespace App\Presenters;

use Nette\Application\UI\Presenter;


class MoviePresenter extends Presenter
{
	/** @var MovieFacade */
	private $facade;
/**
	function __construct(MovieFacade $facade)
	{
		$this->facade = $facade;
	}
**/

	function renderList()
	{

//		$movies = $this->facade->getRecentMovies();
//		require 'template.phtml';
	}
}
