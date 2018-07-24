<?php

namespace App\Modules\Admin\Presenters;

use \App\Forms\FormFactory;
use Nette\Application\UI\Form;

class PostEditPresenter extends BasePresenter
{
	/** @var FormFactory */
	private $formFactory;

	public function __construct(FormFactory $formFactory)
	{
		$this->formFactory = $formFactory;
	}


	/** @return Form */
	protected function createComponentPostForm()
	{
		$form = $this->formFactory->create();
		return $form;
	}
}
