<?php

namespace App\Modules\Front\Presenters;


use App\Model\PostFacade;

class ExportPresenter extends BasePresenter
{
	/** @var PostFacade */
	private $facade;

	const POSTS_PER_FEED = 10;


	public function __construct(PostFacade $facade)
	{
		$this->facade = $facade;
	}

	public function renderRss()
	{
		$this->absoluteUrls = true;
		$posts = $this->facade->getPublicPosts();
		$posts->order('published_at DESC');
		$posts->limit(self::POSTS_PER_FEED);
		$this->template->posts = $posts;
	}
}
