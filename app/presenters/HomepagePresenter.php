<?php

namespace App\Presenters;

use Nette;


class HomepagePresenter extends Nette\Application\UI\Presenter
{
	function createComponentSignForm() //Sign uppercase S
	{
		$form = new Nette\Application\UI\Form();
		$form->addText('name', 'Jmeno');
		$form->addSubmit('send', 'Registrovat');
		return $form;
	}

	function xxx()
	{
		$form = $this->getComponent('signForm'); //sign lowecase s
		$form = $this['signForm']; //syntactic sugar

		$button = $form->getComponent('send');
		$button = $form['send'];
	}
}
