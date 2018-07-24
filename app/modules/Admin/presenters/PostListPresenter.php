<?php

namespace App\Modules\Admin\Presenters;


use App\Model\PostFacade;

class PostListPresenter extends BasePresenter
{
	/** @var PostFacade */
	private $facade;


	public function __construct(PostFacade $facade)
	{
		$this->facade = $facade;
	}

	public function renderDefault()
	{
		$posts = $this->facade->getAllPosts();
		$this->template->posts = $posts;
	}

}
