<?php

namespace App\Modules\Admin\Presenters;


use App\Model\PostFacade;

class PostListPresenter extends BasePresenter
{
	const POSTS_PER_PAGE =7;

	/** @var PostFacade */
	private $facade;


	public function __construct(PostFacade $facade)
	{
		$this->facade = $facade;
	}

	/**
	 * @param int
	 * @throws
	 */
	public function renderDefault( $page = 1)
	{
		if($page < 1) {
			$this->error();
		}


		$posts = $this->facade->getAllPosts();
		$posts->order('published_at DESC');
		$posts->page($page, self::POSTS_PER_PAGE, $lastPage);

		if($page > $lastPage){
			$this->redirect('this', $lastPage);
		}

		$this->template->posts = $posts;
		$this->template->page = $page;
		$this->template->lastPage = $lastPage;
	}

	/** @param int */
	function actionDelete($id)
	{
		$this->facade->deletePost($id);
		$this->flashMessage('Post byl smazan');
		$this->redirect('default');
	}


}
