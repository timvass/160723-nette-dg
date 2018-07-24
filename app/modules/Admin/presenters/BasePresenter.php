<?php

namespace App\Modules\Admin\Presenters;

use Nette;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
	function startup()
	{
		parent::startup();

		if (! $this->isAllowed()) {
			$this->flashMessage('Do administrace se musite nejprve prihlasit');
			$this->redirect('Sign:in');
		}
	}

	protected function isAllowed(): bool
	{
		return $this->getUser()->isLoggedIn();

		//return $this->getUser()->isInRole('admin');
	}
}
