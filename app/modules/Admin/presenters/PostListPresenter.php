<?php

namespace App\Modules\Admin\Presenters;


use App\Model\PostFacade;

class PostListPresenter extends BasePresenter
{
	const POSTS_PER_PAGE =15;

	/** @var PostFacade */
	private $facade;


	public function __construct(PostFacade $facade)
	{
		$this->facade = $facade;
	}

	/**
	 * @param \App\Modules\Admin\Presenters\int $page
	 */
	public function renderDefault( $page = 1)
	{
		$posts = $this->facade->getAllPosts();
		$posts->order('published_at DESC');
		$posts->page($page, self::POSTS_PER_PAGE);


		$this->template->posts = $posts;
		$this->template->page = $page;
	}

}
