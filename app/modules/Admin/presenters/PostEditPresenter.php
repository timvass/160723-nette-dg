<?php

namespace App\Modules\Admin\Presenters;

use App\Forms\FormFactory;
use App\Model\PostFacade;
use Nette\Application\UI\Form;


class PostEditPresenter extends BasePresenter
{
	/** @var FormFactory */
	private $formFactory;

	/** @var PostFacade */
	private $facade;


	public function __construct(FormFactory $formFactory, PostFacade $facade)
	{
		$this->formFactory = $formFactory;
		$this->facade = $facade;
	}

	/** @return  Form */
	protected function createComponentPostForm()
	{
		$form = $this->formFactory->create();

		$form->addSelect('category_id', 'Category:', $this->facade->getCategories())
			->setRequired();
		$form->addText('title', 'Title:')
			->setRequired()
			->addRule($form::MAX_LENGTH, null, 100);
		$form->addTextArea('content', 'Content:')
			->setRequired();
		$form->addCheckbox('draft', 'Draft');
		$form->addSubmit('send');
		$form->addProtection();
		$form->onSuccess[] = [$this, 'formSucceeded'];
		return $form;
	}

	function formSucceeded(Form $form, $vals)
	{
		$this->facade->addPost(
			$vals->category_id,
			$vals->title,
			$vals->content,
			$vals->draft,
			$this->getUser()->getId()
		);
		$this->flashMessage('Příspěvek byl vložen');
		$this->redirect('PostList:');
	}
}
