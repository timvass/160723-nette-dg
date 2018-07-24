<?php

namespace App\Presenters;

use Nette;


class HomepagePresenter extends Nette\Application\UI\Presenter
{
	function createComponentSignForm() //Sign uppercase S
	{
		$form = new Nette\Application\UI\Form();
		$form->addText('name', 'Jmeno')
		->setRequired('Zadejte prosim jmeno');

		$form->addPassword('password', 'Heslo:')
			->setRequired('Zadejte prosim heslo')
		->addRule($form::MIN_LENGTH, null, 8)
		->addRule($form::PATTERN, 'musi obsahovat cislici', '.*\d.*')
		->setOption('description', 'alespon 8 znaku');

		$form->addSubmit('send', 'Registrovat');

		$form->onSuccess[] = [$this, 'signFormSucceeded'];

		return $form;
	}

/**	function xxx()
	{
		$form = $this->getComponent('signForm'); //sign lowecase s
		$form = $this['signForm']; //syntactic sugar

		$button = $form->getComponent('send');
		$button = $form['send'];
	}**/
}
