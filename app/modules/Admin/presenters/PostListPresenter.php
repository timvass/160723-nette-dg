<?php

namespace App\Modules\Admin\Presenters;


class PostListPresenter extends BasePresenter
{

	function startup()
	{
		parent::startup();

		if (! $this->getUser()->isLoggedIn()) {
			$this->flashMessage('Do administrace se musite nejprve prihlasit');
			$this->redirect('Sign:in');
		}
	}
}
