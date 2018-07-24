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

	/** @return bool */
	protected function isAllowed()
	{
		return $this->getUser()->isLoggedIn();
	}
}
