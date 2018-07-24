<?php

namespace App\Modules\Front\Presenters;


use App\Model\PostFacade;

class DetailPresenter extends BasePresenter
{
	/** @var PostFacade */
	private $facade;


	public function __construct(PostFacade $facade)
	{
		$this->facade = $facade;
	}

	public function renderDefault(int $id, ?string $slug)
	{
		$post = $this->facade->getPublicPostById($id);
		if (! $post) {
			$this->error();
		}

		$this->canonicalize('this', [$id, $post->title]);

		$this->template->post = $post;
	}
}
