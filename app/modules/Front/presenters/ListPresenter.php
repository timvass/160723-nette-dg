<?php

namespace App\Modules\Front\Presenters;


use App\Model\PostFacade;

class ListPresenter extends BasePresenter
{
	/** @var PostFacade */
	private $facade;

	const POSTS_PER_PAGE = 7;


	public function __construct(PostFacade $facade)
	{
		$this->facade = $facade;
	}

	public function renderDefault(int $page = 1)
	{
		if ($page < 1) {
			$this->error();
		}

		$posts = $this->facade->getPublicPosts();
		$posts->order('published_at DESC');
		$posts->page($page, self::POSTS_PER_PAGE, $lastPage);

		if ($page > $lastPage) {
			$this->redirect('this', $lastPage);
		}

		$this->template->posts = $posts;
		$this->template->page = $page;
		$this->template->lastPage = $lastPage;
	}

}
