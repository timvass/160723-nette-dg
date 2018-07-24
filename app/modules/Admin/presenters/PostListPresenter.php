<?php

namespace App\Modules\Admin\Presenters;


use App\Model\PostFacade;

class PostListPresenter extends BasePresenter
{
	/** @var PostFacade */
	private $facade;

	const POSTS_PER_PAGE = 7;

//	/** @persistent */
//	public $page = 1;


	public function __construct(PostFacade $facade)
	{
		$this->facade = $facade;
	}

	public function renderDefault(int $page = 1)
	{
		if ($page < 1) {
			$this->error();
		}

		$posts = $this->facade->getAllPosts();
		$posts->order('published_at DESC');
		$posts->page($page, self::POSTS_PER_PAGE, $lastPage);

		if ($page > $lastPage) {
			$this->redirect('this', $lastPage);
		}


		$this->template->posts = $posts;
		$this->template->page = $page;
		$this->template->lastPage = $lastPage;
	}


	function handleDelete(int $id) // signal je na strance 'default'
	{
		$this->facade->deletePost($id);
		$this->flashMessage('Post byl smazán');
		$this->redirect('this');
	}

}
